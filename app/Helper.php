<?php

namespace App;
use App\Models\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Helper {
    public static function userCanAccess($wildcard)
    {
        return Auth::user()->getAllPermissions()->contains(function ($permission) use ($wildcard) {
            return str_starts_with($permission->name, $wildcard);
        });
    }
    
    public static function log($entity_type, $event_type, $entity_id, $event_description, $user = null)
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

    public static function getAccessibleMenusForUser($type, $permissionType)
    {
        $menuIds = [];

        foreach (Auth::user()->getAllPermissions() as $permission) {
            if (Str::startsWith($permission->name, $type.'_'.$permissionType.'_')) {
                $menuIds[] = (int) str_replace($type.'_'.$permissionType.'_', '', $permission->name);
            }
        }

        return $menuIds;
    }

    function fileUpload(Request $request) {
        $file = $request->file;
        $datePath = now()->format('Y/m/d');
        $path = "/uploads/".$datePath;

        $fileUploader = new FileUploadHelper($file, $path);
        $uploaded = $fileUploader->UploadFile("new");

        if ( $uploaded ) {
            return response()->json(["status" => true, "filename" => $path."/".$uploaded]);
        } else {
            return response()->json(["status" => false, "filename" => ""]);
        }
    }
}