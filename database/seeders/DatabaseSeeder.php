<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Karyawan;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(2)->admin()->create()->each(function ($user) {
            if($user->roles == "admin"){
                Admin::create([
                    'user_id' => $user->id,
                ]);
            }
        });

        // Seed data karyawan
        User::factory()->count(2)->karyawan()->create()->each(function ($user) {
            if($user->roles == "karyawan"){
                Karyawan::create([
                    'user_id' => $user->id,
                    'gaji' => 0,
                ]);
            }
        });
    }
}
