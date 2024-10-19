<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RolePermissionController extends Controller
{
    public function index()
    {
        if ( !Auth::user()->can("role_permission") )
            abort(403);

        // Lekérjük az összes szerepkört és jogosultságot
        $roles = Role::where("id", ">", 1)->get();
        $permissions = Permission::all();

        return view('Admin.RolesPermissions.index', compact('roles', 'permissions'));
    }

    public function update(Request $request)
    {
        if ( !Auth::user()->can("role_permission") )
            abort(403);
        
        // Jogosultságok frissítése
        foreach (Role::all() as $role) {
            // Kiválasztjuk a jogosultságokat a beküldött adatokból
            $selectedPermissions = $request->permissions[$role->id] ?? []; // Alapértelmezetten üres tömb

            // Szinkronizáljuk a kiválasztott jogosultságokat
            $role->syncPermissions($selectedPermissions);
        }

        // Sikeres üzenet beállítása a session-ben
        return redirect()->route('permissions.index')->with('success', 'Jogosultságok sikeresen frissítve.');
    }
}
