<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            "Karbantartási mód" => "select|site_modes",
            "Külső hírfolyamok" => "boolean",
            "Partnerek" => "boolean",
            "Felső képsor" => "boolean"
        ];

        foreach ($settings as $setting => $type) {
            Setting::create(['name' => $setting, 'type' => $type, 'value' => "1"]);
        }
    }
}
