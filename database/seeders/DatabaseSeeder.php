<?php

namespace Database\Seeders;

use App\Models\Departments;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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

        $faker = Faker::create(); // Membuat objek Faker untuk menghasilkan data acak

        // Loop untuk membuat 100 data karyawan
        foreach (range(1, 1000) as $index) {
            // Insert data karyawan dengan menggunakan Faker untuk data acak
            DB::table('karyawans')->insert([
                'nik' => $faker->unique()->numerify('###########'), // NIK acak, angka 11 digit
                'nrp' => $faker->unique()->numerify('###########'), // NRP acak, angka 11 digit
                'tgl_lahir' => $faker->date('Y-m-d'), // Tanggal lahir acak
                'nama' => $faker->name, // Nama acak
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']), // Jenis kelamin acak
                'tempat_lahir' => $faker->city, // Tempat lahir acak (misalnya nama kota)
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']), // Agama acak
                'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']), // Golongan darah acak
                'status_perkawinan' => $faker->randomElement(['menikah', 'belum menikah']), // Status perkawinan acak
                'perusahaan' => $faker->company, // Nama perusahaan acak
                'kontraktor' => $faker->company, // Nama kontraktor acak
                'dept' => $faker->randomElement($departments), // Departemen acak dari pluck
                'jabatan' => $faker->jobTitle, // Jabatan acak
                'no_hp' => $faker->phoneNumber, // Nomor HP acak
                'alamat' => $faker->address, // Alamat acak
                'domisili' => $faker->randomElement(['lokal', 'non lokal']), // Domisili acak
                'status' => $faker->randomElement(['aktif', 'non aktif']), // Status aktif/non aktif
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $randomSubrole = $departments[array_rand($departments)];
            User::create([
                'name' => $faker->name,
                'username' => $faker->unique()->numerify('###########'),
                'email' => $faker->unique()->numerify('###########') . '@example.com',
                'role' => 'karyawan',
                'subrole' => $randomSubrole, // Assign subrole acak
                'password' => Hash::make('password'),
            ]);
        }
    }
}
