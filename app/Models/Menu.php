<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'parent_id', 'order'];

    // Szülő-gyermek kapcsolat
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
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
}
