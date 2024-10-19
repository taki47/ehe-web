<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy("name")->get();

        return view("Admin.Roles.index")
            ->with("roles", $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Roles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Insert data into the resources table
            $roleId = DB::table('roles')->insertGetId([
                'name' => $request->name,
                'guard_name' => "web"
            ]);

            // Log the creation of the resource
            Helper::log("Role", "CREATE", $roleId, "Létrehozás");

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("roles.index")->with("success", "A szerepkör létrehozása sikerült!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        return view("Admin.Roles.edit")
            ->with("role", $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $log = [];
        $updateData = [];

        try {
            // Begin a database transaction
            DB::beginTransaction();

            if ( $role->name != $request->name ) {
                $log[] = "Név: ".$role->name." -> ".$request->name;
                $updateData["name"] = $request->name;
            }

            if ( !empty($updateData) ) {
                DB::table('roles')->where('id', $id)->update($updateData);
            
                Helper::log("Role", "MODIFY", $id, json_encode($log));
                Helper::flushPermissionCache();
            }

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("roles.index")->with("success", "A szerepkör módosítása sikerült!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
