<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        "media_type",
        "media_id",
        "content_type",
        "content_id"
    ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
