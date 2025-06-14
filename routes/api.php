<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth.token'])->group(function () {
    Route::get('/user_info', function () {
        return response()->json([
            'message' => 'You are authenticated',
            'user' => request()->user(),
        ]);
    });

    Route::apiResource('items', App\Http\Controllers\ItemController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
