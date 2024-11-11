<?php

namespace Database\Seeders;

use App\Models\PartnerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartnerType::create([
            "name" => "partner",
            "readable" => "Partner"
        ]);
        PartnerType::create([
            "name" => "supporter",
            "readable" => "Támogató"
        ]);
    }
}
