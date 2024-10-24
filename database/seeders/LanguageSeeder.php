<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            "Magyar" => [
                "flag-of-hungary.webp",
                "hu"
            ],
            "English" => [
                "flag-of-the-united-kingdom-3-5svg.webp",
                "en"
            ],
            "Deutch" => [
                "flag-of-germanysvg.webp",
                "de"
            ],
        ];

        foreach ($languages as $language => $properties) {
            Language::create(['name' => $language, "flag" => $properties[0], "lang_code" => $properties[1], "status" => 1]);
        }
    }
}
