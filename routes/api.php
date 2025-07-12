<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesRouteController;
use App\Http\Controllers\SalesOrderController;
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
    Route::get('/sales_orders', [SalesOrderController::class, 'index']);
    Route::get('/sales_orders/{id}', [SalesOrderController::class, 'show']);
    Route::post('/sales_orders', [SalesOrderController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
