<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {
        App::setLocale($request->language);
        Session::put('lang_code', $request->language);

        return redirect()->back();
    }
}
