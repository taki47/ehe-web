<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Banner;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // superadmin beállítása
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Superadmin') ? true : null;
        });

        $languages = null;
        if (Schema::hasTable('languages')) {
            $languages = Language::where("status", 1)->get();
            view()->share('languages', $languages);
        }

        // változók beállítása
        if (request()->is('login') || request()->is('admin') || request()->is('admin/*'))
            return;

        $settings = null;
        if (Schema::hasTable('settings')) {
            $settings = Setting::all();
        }
        $locale = request()->segment(1) ?: env("APP_LOCALE");
        
        $currentLanguage = null;
        if ( Schema::hasTable("languages") ) {
            $currentLanguage = Language::where("lang_code",$locale)->first();
        }

        $banners = null;
        $menus = null;

        if ( $currentLanguage ) {
            $banners = Banner::where("language_id", $currentLanguage->id)
                            ->where("status", 1)
                            ->with("mediaUsages.media")
                            ->get();

            $menus = Menu::whereNull('parent_id')
                            ->where("language_id", $currentLanguage->id)
                            ->where("status", 1)
                            ->with('children')
                            ->orderBy('order')
                            ->get();
        }
                        
        view()->share('settings', $settings);
        view()->share('banners', $banners);
        view()->share('menus', $menus);
    }
}
