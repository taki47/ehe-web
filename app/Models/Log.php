<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['entity_type', 'entity_id', 'event_type', 'event_description', 'user_id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
