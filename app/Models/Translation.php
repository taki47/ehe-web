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
}
