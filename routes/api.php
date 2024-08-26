<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Api\Auth\AuthController;
use App\Http\Controllers\Backend\Api\Auth\AdminAuthController;
use App\Http\Controllers\Backend\Api\Admin\AdminController;
use App\Http\Middleware\UserMiddleware;


Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('user/register', [AuthController::class, 'register']);

    Route::post('user', [AuthController::class, 'getUserAccount'])->middleware('auth:sanctum');

    
    Route::post('admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::post('admin/eselonSatu', [AdminController::class, 'eselonSatu']);
        Route::post('admin/eselonDua', [AdminController::class, 'eselonDua']);
        Route::post('admin/eselonTiga', [AdminController::class, 'eselonTiga']);
        Route::post('admin/fungsi', [AdminController::class, 'fungsi']);
        
        Route::get('admin/getEselonFungsi', [AdminController::class, 'getEselonFungsi']);

    });
});
