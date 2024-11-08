<?php
namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Ha a kérés az "login" vagy az "admin" útvonalon van, ne irányítsuk át
        if ($request->is('login') || $request->is('admin') || $request->is('admin/*')) {
            return $next($request); // Ha login vagy admin, folytatjuk a kérés feldolgozását
        }

        // Ha nincs nyelv az URL-ben, adjuk hozzá az alapértelmezett nyelvet (pl. hu)
        $locale = $request->segment(1) ?: env('APP_LOCALE', 'hu'); // Ha nincs nyelv az URL-ben, alapértelmezett: 'hu'

        // Ellenőrizzük, hogy létezik-e a nyelv az adatbázisban
        $localeExists = Language::where('lang_code', $locale)->exists(); // Ha nem létezik, false-t ad vissza

        // Ha a nyelv nem létezik, állítsuk vissza az alapértelmezett nyelvet
        if ( !$localeExists ) {
            // Ha nem létezik a nyelv, választhatunk, hogy az alapértelmezett nyelvet állítjuk be
            $locale = env('APP_LOCALE', 'hu'); // Alapértelmezett nyelv
            session()->put('locale', $locale);
            App::setLocale($locale);
            return redirect()->to("/".$locale);
        } else {
            // Ha létezik a nyelv, állítsuk be azt
            session()->put('locale', $locale);
            App::setLocale($locale);
        }

        // Ha nincs nyelv az URL-ben, akkor átirányítjuk a megfelelő URL-re
        if (!$request->segment(1)) {
            return redirect()->to("/$locale" . $request->getRequestUri());
        }

        return $next($request);
    }
}