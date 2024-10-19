<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( !Auth::user()->can("user_index") )
            abort(403);
        
        $users = User::all();

        return view("Admin.Users.index")
            ->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( !Auth::user()->can("user_create") )
            abort(403);

        $roles = Role::orderBy("id")->get();

        return view("Admin.Users.create")
            ->with("roles", $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Insert data into the resources table
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'password' => Hash::make($request->password)
            ]);

            // role
            $user = User::find($userId);
            $user->syncRoles($request->role);

            // Log the creation of the resource
            Helper::log("User", "CREATE", $userId, "Létrehozás");

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("users.index")->with("success", "A felhasználó létrehozása sikerült!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ( !Auth::user()->can("user_edit") )
            abort(403);

        $user = User::findOrFail($id);
        $roles = Role::orderBy("id")->get();

        return view("Admin.Users.edit")
            ->with("user", $user)
            ->with("roles", $roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $log = [];
        $updateData = [];

        try {
            // Begin a database transaction
            DB::beginTransaction();

            if ( $user->name != $request->name ) {
                $log[] = "Név: ".$user->name." -> ".$request->name;
                $updateData["name"] = $request->name;
            }

            if ( $request->password!="" ) {
                $log[] = "Jelszó változtatás";
                $updateData["password"] = Hash::make($request->password);
            }
            
            // roles
            $currentRoles = $user->getRoleNames();
            $user->syncRoles($request->role);
            $newRoles = $request->role;
            if ($currentRoles != $newRoles)
                $log[] = "Szerepkör módosítás";


            if ( !empty($updateData) )
                DB::table('users')->where('id', $id)->update($updateData);
            
            if ( !empty($log) ) {
                Helper::log("User", "MODIFY", $id, json_encode($log));
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

        return redirect()->route("users.index")->with("success", "A felhasználó módosítása sikerült!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ( !Auth::user()->can("user_delete") )
            abort(403);

        $user = User::findOrFail($id);
        $user->delete();

        Helper::log("User", "DELETE", $id, "Törlés");

        return redirect()->route("users.index")->with("success", "A felhasználó törlése sikerült!");
    }

    function show() {
        
    }
}
