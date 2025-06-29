<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth.token')->get('/protected', function () {
    return 'Hello, Authenticated User';
});
