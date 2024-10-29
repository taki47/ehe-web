<?php

use App\Http\Controllers\Admin\BannerController;
use App\Models\Language;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\MenuController;
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

    // languages
    Route::get("languages/translations", [LanguageController::class, "translations"])->name("languages.translations");
    Route::post("languages/translations", [LanguageController::class, "translationsUpdate"])->name("languages.translations.update");
    Route::resource("languages", LanguageController::class);
    
    // permissions
    Route::get('permissions', [RolePermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [RolePermissionController::class, 'update'])->name('permissions.update');

    // settings
    Route::get("settings", [SettingsController::class, "index"])->name("settings.index");
    Route::post("settings", [SettingsController::class, "update"])->name("settings.update");

    // media
    Route::get('media/{type}', [MediaController::class, "index"])->name("media.index");
    Route::post('media/{type}', [MediaController::class, "store"])->name("media.store");
    Route::get('media/{type}/create', [MediaController::class, "create"])->name("media.create");
    Route::get('media/{type}/{id}', [MediaController::class, "edit"])->name("media.edit");
    Route::put('media/{type}/{id}', [MediaController::class, "update"])->name("media.update");
    Route::delete('media/{type}/{id}', [MediaController::class, "destroy"])->name("media.destroy");

    // banners
    Route::resource("banner", BannerController::class);
    Route::post('banners/update-status', [BannerController::class, 'updateStatus'])->name('banner.updateStatus');

    // menus
    Route::post("menu/order", [MenuController::class, "updateOrder"])->name("menu.order");
    Route::resource("menu", MenuController::class);

    // napló
     Route::get("/log", [LogController::class, "index"])->name("log.index");
});