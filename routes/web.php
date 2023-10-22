<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
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
