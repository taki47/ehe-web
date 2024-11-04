<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "article_type_id",
        "language_id",
        "menu_id",
        "lead",
        "body",
        "article_status_id"
    ];

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

    function updatedUser() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }

    function menu() {
        return $this->belongsTo(Menu::class, "menu_id", "id");
    }

    function pendingApprovals() {
        return ArticleRevision::where("article_id", $this->id) // Először az article_id-t szűrjük
                            ->where(function($query) { // Csoportosítjuk a feltételeket
                                $query->whereIn("article_status_id", [2, 6, 7])
                                    ->orWhere(function($q) {
                                        $q->where('article_status_id', 1)
                                            ->where('created_by', Auth::user()->id);
                                    });
                            })
                            ->get();
    }
}
