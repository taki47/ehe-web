<?php

use App\Helper;
use App\Models\Language;
use App\Models\Translation;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Middleware\LocaleMiddleware;

Route::get('/', [PublicController::class, "index"])->name("home");
Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post('/login', [AuthController::class, "loginAttempt"])->name("loginAttempt");

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
     Route::get("log", [LogController::class, "index"])->name("log.index");

     // articles
     Route::get("article/{type}", [ArticleController::class, "index"])->name("article.index");
     Route::get("article/{type}/create", [ArticleController::class, "create"])->name("article.create");
     Route::post("article/{type}/create", [ArticleController::class, "store"])->name("article.store");
     Route::get("article/{type}/send-approval/{id}", [ArticleController::class, "approval"])->name("article.sendApproval");
     Route::post("article/{type}/bulk-action", [ArticleController::class, "bulkAction"])->name("article.bulk-actions");
     Route::put("article/{type}/edit/{id}", [ArticleController::class, "update"])->name("article.update");
     Route::get("article/{type}/{operation}/{id}", [ArticleController::class, "edit"])->name("article.editOrApproval");

     // file upload
     Route::post("upload", [Helper::class, "fileUpload"]);
});


Route::group(['prefix' => '{locale}', 'middleware' => LocaleMiddleware::class], function () {
    Route::get('/', [PublicController::class, "index"])->name("home");

    // A fordítások használata
    Route::get(Translation::translation_route('news.title', ['type' => '{type}']), [PublicController::class, 'newsIndex'])->name('news.index');
    Route::get(Translation::translation_route('news.show', ['type' => '{type}', 'slug' => '{slug}']), [PublicController::class, 'newsShow'])->name('news.show');

    // Nyelv változtatás
    Route::get('/language/{lang}', function ($locale, $lang) {
        // Lekérjük az adatbázisból a nyelvet
        $language = Language::where('lang_code', $lang)->first();
    
        if ($language) {
            session()->put('locale', $language->lang_code);
            App::setLocale($language->lang_code);
        }
    
        // Az új URL visszaállítása, hogy csak a nyelvi prefiksz és az oldal többi része legyen benne
        return redirect('/' . $language->lang_code);
    })->name("locale");

    // minden egyéb oldal
    Route::get("/{slug}", [PublicController::class, "page"])->name("page");
});