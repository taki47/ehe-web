<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    function createdUser() {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    function updatedUser() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }
}
