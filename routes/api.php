<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Api\Auth\AuthController;
use App\Http\Middleware\UserMiddleware;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('user/register', [AuthController::class, 'register']);
});