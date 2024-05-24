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
        $adminData = [
            [
                'name' => 'Nova Aditama',
                'gender' => 'Laki-laki',
                'email' => 'NovaAditama@gmail.com',
                'password' => bcrypt('12345678'),
                'roles' => 'admin',
            ],
        ];

        foreach ($adminData as $data) {
            $user = User::factory()->withRealData($data)->create();
            Admin::create([
                'user_id' => $user->id,
            ]);
        }

        $karyawanData = [
            [
                'name' => 'Nendrik meinirmawati',
                'gender' => 'Perempuan',
                'email' => 'NendrikMeinir@gmail.com',
                'password' => bcrypt('12345678'),
                'roles' => 'karyawan',
            ],
            [
                'name' => 'Tina Agustiana',
                'gender' => 'Perempuan',
                'email' => 'TinaAgustiana@gmail.com',
                'password' => bcrypt('12345678'),
                'roles' => 'karyawan',
            ],
        ];

        foreach ($karyawanData as $data) {
            $user = User::factory()->withRealData($data)->create();
            Karyawan::create([
                'user_id' => $user->id,
                'gaji' => 0,
            ]);
        }
    }
}
