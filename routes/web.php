<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// admin
Route::prefix('admin')->group(function () {
    //login
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/', [AuthController::class, 'index'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('post_login');
    });

    Route::middleware(['auth:admin'])->group(function () {

        //users
        Route::resource('users', UserController::class)->names('users');

        //posts
        Route::resource('posts', PostController::class)->names('posts');

        //categories
        Route::resource('categories', CategoryController::class)->names('categories');

        //logout
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

//login
Route::middleware(['guest:user'])->group(function () {
    Route::get('register', [UserAuthController::class, 'viewRegister'])->name('user.register');
    Route::post('post-register', [UserAuthController::class, 'register'])->name('user.post_register');
    Route::get('login', [UserAuthController::class, 'viewLogin'])->name('user.login');
    Route::post('post-login', [UserAuthController::class, 'login'])->name('user.post_login');

    //forgot password
    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('password.email');
    Route::get('reset-password/{token}/{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('update-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.update');
});

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
Route::post('search-post', [DashboardController::class, 'searchPost'])->name('user.search.post');
Route::post('add/category/post', [DashboardController::class, 'addCategoriesToPost'])->name('user.add.category.post');

//posts
Route::resource('posts', UserPostController::class)->names('posts');

Route::middleware(['auth:user'])->group(function () {

    //dashboard

    //posts
    Route::resource('posts', UserPostController::class)->names('user.posts');

    //logout
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
});
