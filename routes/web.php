<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgotSubmit'])->name('forgot.submit');
    Route::get('/forget/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/forget/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');
})->middleware(['guest']);
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('/news')->group(function () {
    Route::get('/', [NewsController::class, 'news'])->name('admin.news');
    Route::get('/add', [NewsController::class, 'newsAdd'])->name('admin.news.add');
    Route::post('/add', [NewsController::class, 'newsStore'])->name('admin.news.store');
    Route::get('/{id}/edit', [NewsController::class, 'newsEdit'])->name('admin.news.edit');
    Route::post('/{id}/edit', [NewsController::class, 'newsUpdate'])->name('admin.news.update');
    Route::get('/{id}/destroy', [NewsController::class, 'newsDestroy'])->name('admin.news.destroy');
    Route::prefix('/category')->group(function () {
        Route::get('/', [NewsController::class, 'category'])->name('admin.category');
        Route::post('/add', [NewsController::class, 'categoryStore'])->name('admin.category.store');
        Route::post('/{id}/edit', [NewsController::class, 'categoryUpdate'])->name('admin.category.update');
        Route::get('/{id}/destroy', [NewsController::class, 'categoryDestroy'])->name('admin.category.destroy');
    });
});

Route::prefix('/report')->group(function () {
    Route::get('/', [ReportController::class, 'report'])->name('admin.report');
    Route::get('/add', [ReportController::class, 'reportAdd'])->name('admin.report.add');
    Route::post('/add', [ReportController::class, 'reportStore'])->name('admin.report.store');
    Route::get('/{id}/edit', [ReportController::class, 'reportEdit'])->name('admin.report.edit');
    Route::post('/{id}/edit', [ReportController::class, 'reportUpdate'])->name('admin.report.update');
    Route::get('/{id}/destroy', [ReportController::class, 'reportDestroy'])->name('admin.report.destroy');
});

Route::prefix('/message')->group(function () {
    Route::get('/', [MessageController::class, 'message'])->name('admin.message');
    Route::get('/{id}/destroy', [MessageController::class, 'messageDestroy'])->name('admin.message.destroy');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'user'])->name('admin.user');
    Route::post('/add', [UserController::class, 'userStore'])->name('admin.user.store');
    Route::post('/{id}/edit', [UserController::class, 'userUpdate'])->name('admin.user.update');
    Route::get('/{id}/destroy', [UserController::class, 'userDestroy'])->name('admin.user.destroy');
});

Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/', [ProfileController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::post('/signin-method', [ProfileController::class, 'signinUpdate'])->name('admin.profile.signin');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('admin.profile.change-password');
});