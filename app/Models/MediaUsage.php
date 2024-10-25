<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaUsage extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
