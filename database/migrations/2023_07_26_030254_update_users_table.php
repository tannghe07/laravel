<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->boolean('is_admin')->after('password');
            $table->string('is_active')->after('is_admin');
            $table->string('first_name')->after('username');
            $table->string('last_name')->after('first_name');
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username', 'is_admin', 'is_active', 'first_name', 'last_name');
            $table->string('name')->after('id');
        });
    }
};
