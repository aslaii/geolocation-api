<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchHistoryController;
use App\Http\Controllers\UserController;

Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api/user', [UserController::class, 'show']);
    Route::get('/api/search-histories', [SearchHistoryController::class, 'index']);
    Route::post('/api/search-histories', [SearchHistoryController::class, 'store']);
    Route::delete('/api/search-histories', [SearchHistoryController::class, 'destroy']);
});


Route::get('/', function () {
    return 'hello';
});
