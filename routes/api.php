<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/1.0/users', [UserController::class, 'index']);

Route::get('/1.0/users/{usersId}', [UserController::class, 'show']);

Route::post('/1.0/users', [UserController::class, 'create']);

Route::post('/1.0/transaction', [TransactionController::class, 'create']);

Route::get('/1.0/accounts/{accountId}/transactions', [TransactionController::class,'history']);

Route::get('/1.0/users/{userId}/account', [AccountController::class, 'show']);

Route::get('/users/{id}/accounts/balance', [UserController::class, 'residue']);
