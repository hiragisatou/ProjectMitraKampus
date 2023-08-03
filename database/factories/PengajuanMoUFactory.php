<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanMoU>
 */
class PengajuanMoUFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'mitra_id' => fake()->numberBetween(1, 99),
            'jenis_kemitraan' => fake()->word(),
            'ruang_lingkup' => implode('+', fake()->words()),
            'tgl_mulai' => now(),
            'prodi_id' => fake()->randomElement([1,2]),
            'keterangan' => fake()->text(150),
            'mou' => fake()->url()
        ];
    }
}
