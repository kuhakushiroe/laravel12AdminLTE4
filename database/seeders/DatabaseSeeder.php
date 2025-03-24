<?php

namespace Database\Seeders;

use App\Models\Departments;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(100)->create();

        Departments::insert([
            [
                'name_department' => 'ENGINEERING',
                'description_department' => 'ENGINEERING',
            ],
            [
                'name_department' => 'PRODUKSI',
                'description_department' => 'PRODUKSI',
            ],
            [
                'name_department' => 'FLO',
                'description_department' => 'FLO',
            ],
            [
                'name_department' => 'SHE',
                'description_department' => 'SHE',
            ]
        ]);


        $departments = Departments::pluck('name_department')->toArray();

        for ($i = 0; $i < 100; $i++) {
            // Pilih subrole secara acak dari departemen yang ada
            $randomSubrole = $departments[array_rand($departments)];

            User::create([
                'name' => 'User' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'role' => 'karyawan',
                'subrole' => $randomSubrole, // Assign subrole acak
                'password' => Hash::make('password'),
            ]);
        }

        User::create([
            'name' => 'Admin',
            'username' => 'admin1',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'subrole' => 'SHE',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);
    }
}
