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
            'nama' => fake()->name(),
            'kriteriaMitra_id' => fake()->randomElement([1,2]),
            'nomorIndukBerusaha' => fake()->randomNumber(7, true),
            'sektorIndustri_id' => fake()->randomElement([1,2]),
            'sifat_id' => fake()->randomElement([1,2]),
            'jenis_id' => fake()->randomElement([1,2]),
            'user_id' => fake()->unique()->numberBetween(0, 100),
            'klasifikasi' => fake()->randomElement([1,2]),
            'jumlahPegawai' => fake()->randomNumber(3, false),
            'alamat' => fake()->streetAddress(),
            'provinsi_id' => 11,
            'kabupaten_id' => 1101,
            'kecamatan_id' => 1101010,
            'urlWeb' => fake()->domainName(),
            'email' => fake()->companyEmail(),
            'noTelp' => fake()->phoneNumber(),
            'linkedin' => fake()->userName(),
            'instagram' => fake()->userName(),
            'facebook' => fake()->userName(),
            'twitter' => fake()->userName(),
            'tiktok' => fake()->userName(),
            'youtube' => fake()->userName()
        ];
    }
}
