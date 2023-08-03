<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\JenisMitra;
use App\Models\SifatMitra;
use App\Models\KriteriaMitra;
use App\Models\PengajuanMoU;
use App\Models\SektorIndustri;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        User::create(['name' => 'Administrator', 'email' => 'admin', 'password' => bcrypt('1234qwer'), 'role' => 'admin', 'email_verified_at' => now()]);
        User::create(['name' => 'Admin Prodi', 'email' => 'prodiakuntansi', 'password' => bcrypt('1234qwer'), 'role' => 'prodi', 'email_verified_at' => now()]);
        User::create(['name' => 'Admin Prodi', 'email' => 'prodiapolitik', 'password' => bcrypt('1234qwer'), 'role' => 'prodi', 'email_verified_at' => now()]);

        SektorIndustri::create(['name' => 'Perdagangan Besar dan Eceran']);
        SektorIndustri::create(['name' => 'Reparasi dan Perawatan Mobil dan Sepeda Motor']);

        SifatMitra::create(['name' => 'Nasional']);
        SifatMitra::create(['name' => 'Internasional']);

        JenisMitra::create(['name' => 'Pemerintahan']);
        JenisMitra::create(['name' => 'Dudi']);
        JenisMitra::create(['name' => 'Sekolah']);
        JenisMitra::create(['name' => 'Perguruan Tinggi']);
        JenisMitra::create(['name' => 'Organisasi']);

        KriteriaMitra::create(['name' => 'Perusahaan Swasta']);
        KriteriaMitra::create(['name' => 'Perusahaan Negeri']);

        Prodi::create(['name' => 'Akuntansi', 'jurusan_id' => 1]);
        Prodi::create(['name' => 'Politik', 'jurusan_id' => 1]);

        $this->call([
            AlamatSeeder::class,
        ]);

        Mitra::factory(100)->create();
        PengajuanMoU::factory(500)->create();
    }
}
