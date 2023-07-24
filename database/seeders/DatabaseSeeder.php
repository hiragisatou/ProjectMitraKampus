<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sektor;
use App\Models\Kriteria;
use App\Models\JenisMitra;
use App\Models\Prodi;
use App\Models\SifatMitra;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(['name' => 'Administrator', 'email' => 'administrator', 'password' => bcrypt('1234qwer'), 'role' => 'admin']);
        User::create(['name' => 'Admin Prodi', 'email' => 'programstudi', 'password' => bcrypt('1234qwer'), 'role' => 'prodi']);

        //sektor seeders
        Sektor::create(['sektor' => 'Perdagangan Besar dan Eceran']);
        Sektor::create(['sektor' => 'Reparasi dan Perawatan Mobil dan Sepeda Motor']);

        SifatMitra::create(['kategori' => 'Nasional']);
        SifatMitra::create(['kategori' => 'Internasional']);

        JenisMitra::create(['jenis' => 'Pemerintahan']);
        JenisMitra::create(['jenis' => 'Dudi']);
        JenisMitra::create(['jenis' => 'Sekolah']);
        JenisMitra::create(['jenis' => 'Perguruan Tinggi']);
        JenisMitra::create(['jenis' => 'Organisasi']);

        Kriteria::create(['kriteria' => 'Perusahaan Swasta']);
        Kriteria::create(['kriteria' => 'Perusahaan Negeri']);

        Prodi::create(['prodi' => 'Akuntansi', 'jurusan_id' => 1]);
        Prodi::create(['prodi' => 'Politik', 'jurusan_id' => 1]);

        $this->call([
            AlamatSeeder::class,
        ]);
    }
}
