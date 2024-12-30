<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisSurat>
 */
class JenisSuratFactory extends Factory
{
    protected $model = \App\Models\JenisSurat::class;

    public function definition()
    {
        return [
            'nama_jenis' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
        ];
    }
}
