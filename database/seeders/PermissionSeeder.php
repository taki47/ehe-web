<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "user_index" => "Felhasználók listázása",
            "user_create" => "Felhasználó létrehozása",
            "user_edit" => "Felhasználó szerkesztése",
            "user_delete" => "Felhasználó törlése",
            "role_index" => "Szerepkörök listázása",
            "role_create" => "Szerepkör létrehozása",
            "role_edit" => "Szerepkör szerkesztése",
            "role_delete" => "Szerepkör törlése",
            "role_permission" => "Szerepkörök - jogosultságok összerendelése",
            "settings" => "Weboldal beállítások"
        ];

        foreach ($permissions as $name => $readable) {
            Permission::create(['name' => $name, 'readable' => $readable, "guard_name" => "web"]);
        }
    }
}
