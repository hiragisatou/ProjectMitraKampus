<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mitra>
 */
class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'kriteria_mitra_id' => fake()->randomElement([1,2]),
            'nib' => fake()->randomNumber(7, true),
            'sektor_industri_id' => fake()->randomElement([1,2]),
            'sifat_mitra_id' => fake()->randomElement([1,2]),
            'jenis_mitra_id' => fake()->randomElement([1,2]),
            'user_id' => fake()->unique()->numberBetween(1, 100),
            'klasifikasi' => fake()->randomElement([1,2]),
            'jumlah_pegawai' => fake()->randomNumber(3, false),
            'alamat' => fake()->streetAddress(),
            'kecamatan_id' => 5103050,
            'url' => fake()->domainName(),
            'email' => fake()->companyEmail(),
            'no_telp' => fake()->phoneNumber(),
            'linkedin' => fake()->userName(),
            'instagram' => fake()->userName(),
            'facebook' => fake()->userName(),
            'twitter' => fake()->userName(),
            'tiktok' => fake()->userName(),
            'youtube' => fake()->userName()
        ];
    }
}
