<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}