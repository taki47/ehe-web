<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Banner;
use App\Models\Article;
use App\Models\Language;
use App\Models\Partner;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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

        $partners = Partner::where("partner_type_id", 1)->where("status", 1)->get();
        $supporters = Partner::where("partner_type_id", 2)->where("status", 1)->get();

        // Menü elemekhez szín hozzárendelése
        $categories = [
            "travel",
            "food",
            "sports",
            "fashion"
        ];

        $i = 0;
        foreach ($menus as $menu) {
            // Menü kategória hozzárendelése
            $menu->category = $categories[$i];
            
            // $i növelése, és ha túlmegy a kategóriák számán, akkor újra nullázás
            $i = ($i + 1) % count($categories);  // A % operátor biztosítja, hogy újrainduljon 0-ról
        }

        return view("index", compact("banners", "menus", "partners", "supporters"));
    }

    function newsIndex($lang, $menu)
    {
        $articles = $this->getArticles(1, $menu);
        $menu = Menu::where("slug", $menu)->first();
        $type = "news";
        $archive = false;
        return view("articles", compact("articles", "type", "menu", "archive"));
    }

    function newsArchive($lang, $menu)
    {
        $articles = $this->getArticles(1, $menu, true);
        $type = "news";
        $menu = Menu::where("slug", $menu)->first();
        $archive = true;

        return view("articles", compact("articles", "type", "menu", "archive"));
    }

    function newsShow($lang, $menu, $slug)
    {
        $article = $this->getArticle($slug, $menu);
        $type = "news";
        return view("article", compact("article", "type"));
    }

    function foreignNewsIndex($lang, $menu)
    {
        $articles = $this->getArticles(2, $menu);
        $menu = Menu::where("slug", $menu)->first();
        $type = "foreignnews";
        $archive = false;

        return view("articles", compact("articles", "type", "menu", "archive"));
    }

    function foreignNewsArchive($lang, $menu)
    {
        $articles = $this->getArticles(2, $menu, true);
        $menu = Menu::where("slug", $menu)->first();
        $type = "foreignnews";
        $archive = true;

        return view("articles", compact("articles", "type", "menu", "archive"));
    }

    function foreignNewsShow($lang, $menu, $slug)
    {
        $article = $this->getArticle($slug, $menu);
        $type = "foreignnews";
        return view("article", compact("article", "type"));
    }

    function eventsIndex($lang)
    {
        $articles = $this->getArticles(3);
        $type = "events";
        $archive = false;
        return view("articles", compact("articles", "type", "archive"));
    }

    function eventsArchive($lang)
    {
        $articles = $this->getArticles(3, null, true);
        $type = "events";
        $archive = true;
        return view("articles", compact("articles", "type", "archive"));
    }

    function eventsShow($lang, $slug)
    {
        $article = $this->getArticle($slug);
        $type = "events";
        return view("article", compact("article", "type"));
    }

    private function getArticle($slug, $menu=null)
    {
        $currentLanguage = Language::where("lang_code",App::getLocale())->first();
        $currentMenu = Menu::where("slug", $menu)->where("language_id", $currentLanguage->id)->first();

        $query = Article::where("slug", $slug)
                        ->where("language_id", $currentLanguage->id)
                        ->where("article_status_id", 3);

        if ( $menu )
            $query->where("menu_id", $currentMenu->id);

        $articles = $query->firstOrFail();

        return $articles;
    }

    private function getArticles($articleTypeId, $menu=null, $archive=false)
    {
        $currentLanguage = Language::where("lang_code",App::getLocale())->first();
        $currentMenu = Menu::where("slug", $menu)->where("language_id", $currentLanguage->id)->first();

        $query = Article::where("article_type_id", $articleTypeId)
                        ->where("language_id", $currentLanguage->id)
                        ->where("article_status_id", ($archive ? 4 : 3))
                        ->orderBy("id", "desc");

        if ( $menu )
            $query->where("menu_id", $currentMenu->id);

        $articles = $query->paginate(10);

        return $articles;
    }

    function page($locale, $slug)
    {
        $currentLanguage = Language::where("lang_code", $locale)->first();
        $article = Article::where("slug", $slug)->where("language_id", $currentLanguage->id)->where("article_status_id",3)->firstOrFail();

        return view("page", compact("article"));
    }
}
