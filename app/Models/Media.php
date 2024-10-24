<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file_name', 'file_path', 'type', 'created_by'];

    public function createdUser() {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function updatedUser() {
        return $this->belongsTo(User::class, "updated_by", "id");
    }
}
