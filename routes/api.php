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
    Route::get('eselon', [AuthController::class, 'getEselon']);
    Route::get('eselonDua', [AuthController::class, 'getEselonDua']);
    Route::get('eselonTiga', [AuthController::class, 'getEselonTiga']);
    Route::get('fungsi', [AuthController::class, 'getFungsi']);

    Route::get('roles', [AuthController::class, 'getRoles']);

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

        //User
        Route::get('admin/users', [AdminController::class, 'getUser']);
        Route::put('admin/verified/{id}', [AdminController::class, 'verified']);

        //logout
        Route::post('admin/logout', [AdminAuthController::class, 'destroy']);
    });
});
