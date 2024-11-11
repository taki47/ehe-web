<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(MediaTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(MediaUsagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(PartnersTableSeeder::class);
    }
}
