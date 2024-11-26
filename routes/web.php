<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
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
});