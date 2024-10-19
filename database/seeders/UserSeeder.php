<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $user = new User();
        $user->name = "admin";
        $user->password = Hash::make("1");
        $user->save();
        $user->assignRole("Adminisztrátor");

        $user = new User();
        $user->name = "kezelő";
        $user->password = Hash::make("1");
        $user->save();
        $user->assignRole("Kezelő");

        $user = new User();
        $user->name = "Taki";
        $user->password = Hash::make("2");
        $user->save();
        $user->assignRole("Superadmin");
    }
}
