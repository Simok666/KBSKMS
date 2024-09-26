<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\API\Auth\AuthController;
use App\Http\Controllers\Backend\API\Auth\AdminAuthController;
use App\Http\Controllers\Backend\API\Auth\OperatorAuthController;
use App\Http\Controllers\Backend\API\Admin\AdminController;
use App\Http\Controllers\Backend\API\Knowledge\ContributorController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Backend\API\Knowledge\VerificatorController;
use App\Http\Controllers\Backend\API\HomeController;


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
    
    Route::get('pengetahuan', [ContributorController::class, 'getContributor'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    Route::Post('addOrUpdatePengetahuan', [ContributorController::class, 'contributor'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    Route::get('listKategori', [ContributorController::class, 'listKategori'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    Route::get('listUser', [ContributorController::class, 'listUser'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    
    Route::put('publish/{id}', [VerificatorController::class, 'publish'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    Route::put('revisi/{id}', [VerificatorController::class, 'revisi'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);
    Route::put('komentar/{id}', [VerificatorController::class, 'komentar'])->middleware(['auth:sanctum', 'checkRole:type.user,type.admin,type.operator']);

    


    // User Home 
    Route::get('getKategori', [AdminController::class, 'getKategori']);
    Route::get('getMultimedia', [ContributorController::class, 'getMultimedia']);
    Route::get('search', [HomeController::class, 'search']);
    Route::post('admin/login', [AdminAuthController::class, 'login']);
    Route::post('operator/login', [OperatorAuthController::class, 'login']);
    Route::get('getContent/{category}', [HomeController::class, 'getContent']);
    Route::get('getBlog/{slug}', [HomeController::class, 'getBlog']);
    
    // conten Action
    Route::post('share', [HomeController::class, 'share'])->middleware('auth:sanctum');
    Route::put('like', [HomeController::class, 'like'])->middleware('auth:sanctum');
    Route::put('rating', [HomeController::class, 'rating'])->middleware('auth:sanctum');
    Route::post('comment', [HomeController::class, 'comment'])->middleware('auth:sanctum');
    
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
