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
            "banner_index" => "Banner listázása",
            "banner_create" => "Banner létrehozása",
            "banner_edit" => "Banner szerkesztése",
            "banner_delete" => "Banner törlése",
            "any_menu_index" => "Bármely menü listázása",
            "any_menu_create" => "Bármely menü létrehozása",
            "any_menu_edit" => "Bármely menü szerkesztése",
            "any_menu_order" => "Bármely menü sorrendjének módosítása",
            "any_menu_delete" => "Bármely menü törlése",
            "any_news_index" => "Bármely hírek listázása",
            "any_news_create" => "Bármely hírek létrehozása",
            "any_news_edit" => "Bármely hírek szerkesztése",
            "any_news_approval" => "Bármely hírek jóváhagyása",
            "any_news_delete" => "Bármely hírek törlése",
            "any_events_index" => "Bármely események listázása",
            "any_events_create" => "Bármely események létrehozása",
            "any_events_edit" => "Bármely események szerkesztése",
            "any_events_approval" => "Bármely események jóváhagyása",
            "any_events_delete" => "Bármely események törlése",
            "any_pages_index" => "Bármely oldalak listázása",
            "any_pages_create" => "Bármely oldalak létrehozása",
            "any_pages_edit" => "Bármely oldalak szerkesztése",
            "any_pages_approval" => "Bármely oldalak jóváhagyása",
            "any_pages_delete" => "Bármely oldalak törlése",
            "log" => "Napló megtekintése",
        ];

        foreach ($permissions as $name => $readable) {
            Permission::create(['name' => $name, 'readable' => $readable, "guard_name" => "web"]);
        }
    }
}
