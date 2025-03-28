<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User Test',
            'email' => 'test@example.com',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Pastikan menggunakan hash
            'role' => 'Admin',
            'nomor_hp' => '082134885973',
            'alamat_utama' => 'Alamat Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'), // Pastikan menggunakan hash
            'role' => 'User',
            'alamat_utama' => 'Alamat User',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            JenisSuratsSeeder::class,
            FielsSuratsSeeder::class,
            SettingSeeder::class
        ]);
    }
}
