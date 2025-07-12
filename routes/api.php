<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesRouteController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth.token'])->group(function () {
    Route::get('/user_info', function () {
        return response()->json([
            'message' => 'You are authenticated',
            'user' => request()->user(),
        ]);
    });

    Route::get('/sales_route', [SalesRouteController::class, 'index']);
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::apiResource('items', App\Http\Controllers\ItemController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
}
);
