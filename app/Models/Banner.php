<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    public function createdUser() {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function updatedUser() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }

    public function mediaUsages()
    {
        return $this->hasMany(MediaUsage::class, 'content_id');
    }

    public function language() {
        return $this->belongsTo(Language::class);
    }
}
