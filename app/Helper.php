<?php

namespace App;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class Helper {
    public static function userCanAccess($wildcard)
    {
        return Auth::user()->getAllPermissions()->contains(function ($permission) use ($wildcard) {
            return str_starts_with($permission->name, $wildcard);
        });
    }
    
    public static function log($entity_type, $event_type, $entity_id, $event_description)
    {
        if ( Auth::user() )
            $user = Auth::user()->id;

        Log::create([
            "entity_type"       => $entity_type,
            "event_type"        => $event_type,
            "entity_id"         => $entity_id,
            "event_description" => $event_description,
            "user_id"           => $user
        ]);
    }

    public static function get_name_from_id($modelName, $id, $responseField = "name")
    {
        if ( $id == null )
            return "[--ÜRES--]";

        if ( $modelName=="Accountable_user" )
            $modelName = "User";
        
        $model = $modelName;
        $data  = $model::find($id);
        if ( $data )
            return $data->$responseField;
        
        return "[--ÜRES--]";
    }

    public static function flushPermissionCache() {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}