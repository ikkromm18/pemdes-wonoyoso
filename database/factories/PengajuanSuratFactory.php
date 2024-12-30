<?php

namespace Database\Factories;

use App\Models\JenisSurat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanSurat>
 */
class PengajuanSuratFactory extends Factory
{
    protected $model = \App\Models\PengajuanSurat::class;

    public function definition()
    {
        return [

            'nik' => User::factory(),
            'nama' => fake()->name(), // Pastikan ini 'nama' sesuai dengan migrasi
            'email' => fake()->email(),
            'alamat' => fake()->address(), // Ganti 'alamat()' dengan 'address()'
            'jenis_surat_id' => JenisSurat::factory(),
            'status' => 'pending',
        ];
    }
}
