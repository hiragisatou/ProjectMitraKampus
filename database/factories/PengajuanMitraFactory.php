<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanMitra>
 */
class PengajuanMitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(),
            'mitra_id' => fake()->numberBetween(1, 99),
            'jenisKemitraan' => fake()->word(),
            'ruangLingkup' => implode('+', fake()->words()),
            'tgl_mulai' => now(),
            'prodi_id' => fake()->randomElement([1,2]),
            'keterangan' => fake()->text(150),
            'file_mou' => fake()->url()
        ];
    }
}
