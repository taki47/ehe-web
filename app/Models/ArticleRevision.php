<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleRevision extends Model
{
    use HasFactory;

    function language()
    {
        return $this->belongsTo(Language::class);
    }

    function status()
    {
        return $this->belongsTo(ArticleStatus::class, "article_status_id", "id");
    }

    function createdUser() {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    function menu() {
        return $this->belongsTo(Menu::class, "menu_id", "id");
    }

    function article() {
        return $this->belongsTo(Article::class, "article_id", "id");
    }
}
