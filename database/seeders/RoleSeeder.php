<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Superadmin',
                'guard_name' => 'web',
                'created_at' => '2024-06-03 0:00:00',
                'updated_at' => '2024-06-03 0:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Adminisztrátor',
                'guard_name' => 'web',
                'created_at' => '2024-06-03 0:00:00',
                'updated_at' => '2024-06-03 0:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kezelő',
                'guard_name' => 'web',
                'created_at' => '2024-06-03 0:00:00',
                'updated_at' => '2024-06-03 0:00:00',
            )
        ));

    }
}
