<?php

use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RolePermissionController;

Route::get('/', [PublicController::class, "index"])->name("home");

Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post('/login', [AuthController::class, "loginAttempt"])->name("loginAttempt");

Route::get('/language/{lang}', function ($lang) {
    // Lekérjük az adatbázisból a nyelvet
    $language = Language::where('lang_code', $lang)->first();

    if ($language)
        session()->put('locale', $language->lang_code);

    return redirect()->back();
})->name("locale");

Route::prefix('admin')->middleware("checkUser")->group(function () {
    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get('/', [AdminController::class, "dashboard"])->name("admin.dashboard");

    Route::resource("users", Usercontroller::class);
    Route::resource("roles", RoleController::class);
    Route::resource("languages", LanguageController::class);
    
    Route::get('permissions', [RolePermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [RolePermissionController::class, 'update'])->name('permissions.update');

    Route::get("settings", [SettingsController::class, "index"])->name("settings.index");
    Route::post("settings", [SettingsController::class, "update"])->name("settings.update");
});