<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Customer;
use App\Models\Admin;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create()->each(function ($user) {
            if ($user->roles == "customer") {
                Customer::create([
                    'user_id' => $user->id,
                ]);
            }
            if($user->roles == "admin"){
                Admin::create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
