<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('master');
})->middleware(['auth', 'verified']);

Route::prefix('user')
    ->middleware([
        'auth',
        'checkadmin',
    ])
    ->group(function () {
        Route::name('user.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('store');
                Route::get('/delete/{id}', 'destroy')->name('destroy');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('update');
            });

        Route::name('post.')
            ->controller(PostController::class)
            ->group(function () {
                Route::get('/{user}/post', 'index')->name('index');
                Route::get('/{user}/post/create', 'create')->name('create');
                Route::post('/{user}/post/create', 'store')->name('store');
                Route::get('{user}/post/delete/{id}', 'destroy')->name('destroy');
                Route::get('{user}/post/edit/{id}', 'edit')->name('edit');
                Route::post('{user}/post/edit/{id}', 'update')->name('update');
            });
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('change-language/{language}', [\App\Http\Controllers\LangController::class, 'changeLanguage'])->name('change-language');

require __DIR__.'/auth.php';
