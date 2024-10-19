<?php

namespace Database\Seeders;

use App\Models\SiteMode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteModes = [
            "Publikálva",
            "Szerkesztés alatt"
        ];

        foreach ($siteModes as $siteMode) {
            SiteMode::create(['name' => $siteMode]);
        }
    }
}
