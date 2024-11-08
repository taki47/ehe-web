<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'parent_id', 'order'];

    // Szülő-gyermek kapcsolat
    public function children()
    {
        //return $this->hasMany(Menu::class, 'parent_id')->where("status",1)->orderBy('order');
        $query = $this->hasMany(Menu::class, "parent_id")->orderBy("order");

        if ( !auth()->user() || !(\App\Helper::userCanAccess('menu_create_') || Auth::user()->can("any_menu_create")) ) {
            $query->where("status", 1);
        }

        return $query;
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function getTopLevelParentId()
    {
        $currentMenu = $this;
        while ($currentMenu->parent_id) {
            $currentMenu = Menu::find($currentMenu->parent_id);
        }
        return $currentMenu->id;
    }

    function language() {
        return $this->belongsTo(Language::class);
    }

    function getArticles($articleType, $take) {
        $menuId = $this->id;
        $currentLanguage = Language::where("lang_code",App::getLocale())->first();

        return Article::where("article_type_id",$articleType)->where("menu_id", $menuId)->where("language_id", $currentLanguage->id)->take($take)->get();
    }
}
