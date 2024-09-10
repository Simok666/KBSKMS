<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Api\Auth\AuthController;
use App\Http\Controllers\Backend\Api\Auth\AdminAuthController;
use App\Http\Controllers\Backend\Api\Admin\AdminController;
use App\Http\Controllers\Backend\Api\Knowledge\ContributorController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Backend\Api\Knowledge\VerificatorController;


Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('user/register', [AuthController::class, 'register']);
    Route::get('eselon', [AuthController::class, 'getEselon']);
    Route::get('eselonDua', [AuthController::class, 'getEselonDua']);
    Route::get('eselonTiga', [AuthController::class, 'getEselonTiga']);
    Route::get('fungsi', [AuthController::class, 'getFungsi']);

    Route::get('roles', [AuthController::class, 'getRoles']);

    Route::post('user', [AuthController::class, 'getUserAccount'])->middleware('auth:sanctum');
    Route::post('getRoles', [AuthController::class, 'getUsersRoles'])->middleware('auth:sanctum');
    
    Route::get('pengetahuan', [ContributorController::class, 'getContributor'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    Route::Post('addOrUpdatePengetahuan', [ContributorController::class, 'contributor'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    Route::get('listKategori', [ContributorController::class, 'listKategori'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    Route::get('listUser', [ContributorController::class, 'listUser'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    
    Route::put('publish/{id}', [VerificatorController::class, 'publish'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    Route::put('revisi/{id}', [VerificatorController::class, 'revisi'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);
    Route::put('komentar/{id}', [VerificatorController::class, 'komentar'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin']);

    Route::post('admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::post('admin/eselonSatu', [AdminController::class, 'eselonSatu']);
        Route::post('admin/eselonDua', [AdminController::class, 'eselonDua']);
        Route::post('admin/eselonTiga', [AdminController::class, 'eselonTiga']);
        Route::post('admin/fungsi', [AdminController::class, 'fungsi']);
        
        Route::get('admin/getEselonFungsi', [AdminController::class, 'getEselonFungsi']);

        //Kategori
        Route::get('admin/kategori', [AdminController::class, 'getKategori']);
        Route::Post('admin/addOrUpdateKategori', [AdminController::class, 'kategori']);
    
        //User
        Route::get('admin/users', [AdminController::class, 'getUser']);
        Route::put('admin/verified/{id}', [AdminController::class, 'verified']);

        //pengetahuan
        Route::get('admin/pengetahuan', [ContributorController::class, 'getContributor']);
        Route::Post('admin/addOrUpdatePengetahuan', [ContributorController::class, 'contributor']);
        Route::get('admin/listKategori', [ContributorController::class, 'listKategori']);
        Route::get('admin/listUser', [ContributorController::class, 'listUser']);


        //logout
        Route::post('admin/logout', [AdminAuthController::class, 'destroy']);
    });
});
