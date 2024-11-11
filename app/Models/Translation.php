<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'language',
        'value'
	  ];

    public static function getTranslation($key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return Cache::remember("translation_{$locale}_{$key}", 60, function () use ($key, $locale) {
            return self::where('key', $key)->where('language', $locale)->first()->value ?? $key;
        });
    }

    public static function translation_route(string $key, array $params = [], string $lang = "")
    {
        // Aktuális nyelvet használjuk
        $locale = "";
        if ( $lang!="" ) {
            $locale = $lang;
        } else {
            $locale = request()->segment(1);
        }

        if ( !$locale )
            return false;

        // ha nem létezik az adott nyelv
        $localeExists = Language::where('lang_code', $locale)->exists(); // Ha nem létezik, false-t ad vissza
        if ( !$localeExists )
            return false;

        // Fordítás lekérdezése a translations táblából
        $translation = Translation::where('key', $key)->where('language', $locale)->first();

        if (!$translation || !$translation->is_link || !$translation->url) {
            return route($key, $params); // alapértelmezett route, ha nincs fordítás
        }

        // Paraméterek helyettesítése az URL-ben
        $url = $translation->url;
        foreach ($params as $paramKey => $paramValue) {
            $url = str_replace("{" . $paramKey . "}", $paramValue, $url);
        }

        return $url;
    }
}
