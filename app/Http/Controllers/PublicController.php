<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Banner;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

class PublicController extends Controller
{
    function index() : View {
        $currentLanguage = Language::where("lang_code",App::getLocale())->first();

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

        return view("index", compact("banners", "menus"));
    }
}
