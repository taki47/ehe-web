<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        // változók beállítása
        $settings = Setting::all();
        $languages = Language::where("status", 1)->get();
        view()->share('settings', $settings);
        view()->share('languages', $languages);

        // superadmin beállítása
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Superadmin') ? true : null;
        });
    }
}
