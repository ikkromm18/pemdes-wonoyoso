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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Pastikan menggunakan hash
            'role' => 'Admin',
            'alamat' => 'Alamat Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'), // Pastikan menggunakan hash
            'role' => 'User',
            'alamat' => 'Alamat User',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            JenisSuratsSeeder::class,
            FielsSuratsSeeder::class
        ]);
    }
}
