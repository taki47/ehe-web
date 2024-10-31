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

    function getEntityName($entityType, $entityId) {
        if ( $entityType=="news" ) {
            $entityType = "Article";
        }
        
        // Dinamikusan létrehozzuk a modell osztály nevét
        $modelClass = "\App\Models\\" . $entityType;

        // Ellenőrizzük, hogy a modell létezik-e
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Invalid entity type: " . $entityType);
        }

        // Lekérdezzük az entitást az ID alapján
        $entity = $modelClass::withTrashed()->find($entityId);

        // Ellenőrizzük, hogy az entitás létezik-e
        if (!$entity) {
            return null; // Vagy dobhatunk kivételt, ha szükséges
        }

        // Visszaadjuk az entitás nevét
        return $entity->name; // Feltételezve, hogy az entitásnak van 'name' mezője
    }
}
