<?php

namespace Database\Seeders;

use App\Models\ArticleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleType::create([
            "name" => "Hírek",
            "slug" => "news",
            "cover_path" => "/images/news"
        ]);

        ArticleType::create([
            "name" => "Külföldi hírek",
            "slug" => "foreign_news",
            "cover_path" => "/images/foreign_news"
        ]);

        ArticleType::create([
            "name" => "Események",
            "slug" => "events",
            "cover_path" => "/images/events"
        ]);
    }
}
