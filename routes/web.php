<?php

use App\Http\Controllers\Admin\Usercontroller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, "index"])->name("home");

Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post('/login', [AuthController::class, "loginAttempt"])->name("loginAttempt");

Route::prefix('admin')->middleware("checkUser")->group(function () {
    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get('/', [AdminController::class, "dashboard"])->name("admin.dashboard");

    Route::resource("users", Usercontroller::class);
});