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
            'kriteria_id' => fake()->randomElement([1,2]),
            'nib' => fake()->randomNumber(7, true),
            'sektor_id' => fake()->randomElement([1,2]),
            'sifat_id' => fake()->randomElement([1,2]),
            'jenis_id' => fake()->randomElement([1,2]),
            'klasifikasi' => fake()->randomElement([1,2]),
            'jumlah_pegawai' => fake()->randomNumber(3, false),
            'alamat' => fake()->streetAddress(),
            'provinsi_id' => '1',
            'kabupaten_id' => '1',
            'kecamatan_id' => '1',
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
