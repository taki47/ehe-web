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
            "settings" => "Weboldal beállítások",
            "language_index" => "Nyelvek listázása",
            "language_create" => "Nyelvek létrehozása",
            "language_edit" => "Nyelvek szerkesztése",
            "language_delete" => "Nyelvek törlése",
            "translation_update" => "Fordítások frissítése",
            "media_image_index" => "Képtárban listázása",
            "media_image_create" => "Képtár kép létrehozása",
            "media_image_edit" => "Képtár kép szerkesztése",
            "media_image_delete" => "Képtár kép törlése",
            "media_audio_index" => "Hangtár listázása",
            "media_audio_create" => "Hangtár létrehozása",
            "media_audio_edit" => "Hangtár szerkesztése",
            "media_audio_delete" => "Hangtár törlése",
            "media_video_index" => "Videótár listázása",
            "media_video_create" => "Videótár létrehozása",
            "media_video_edit" => "Videótár szerkesztése",
            "media_video_delete" => "Videótár törlése",
        ];

        foreach ($permissions as $name => $readable) {
            Permission::create(['name' => $name, 'readable' => $readable, "guard_name" => "web"]);
        }
    }
}
