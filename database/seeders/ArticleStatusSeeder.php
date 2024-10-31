<?php

namespace Database\Seeders;

use App\Models\ArticleStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleStatus::create([
            "name" => "Piszkozat"
        ]);
        ArticleStatus::create([
            "name" => "Jóváhagyásra vár"
        ]);
        ArticleStatus::create([
            "name" => "Aktív"
        ]);
        ArticleStatus::create([
            "name" => "Inaktív"
        ]);
        ArticleStatus::create([
            "name" => "Jóváhagyott"
        ]);
        ArticleStatus::create([
            "name" => "Elutasított"
        ]);
    }
}
