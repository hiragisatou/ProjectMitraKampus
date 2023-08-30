<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Sifat;
use App\Models\Sektor;
use App\Models\Jurusan;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $user = new User(['name' => 'Administrator', 'email' => 'admin1', 'password' => bcrypt('1234qwer'),  'email_verified_at' => now()]);
        $user->save();
        $user->role()->save(new Role(['name' => 'admin', 'roleable_id' => '1', 'roleable_type' => 'App\Models\VerifyMou']));
        $user1 = User::create(['name' => 'Administrator', 'email' => 'admin', 'password' => bcrypt('1234qwer'),  'email_verified_at' => now()]);
        $user1->role()->save(new Role(['name' => 'admin', 'roleable_id' => '2', 'roleable_type' => 'App\Models\VerifyMou']));
        $prodi1 = User::create(['name' => 'Admin Prodi', 'email' => 'prodi1', 'password' => bcrypt('1234qwer'), 'email_verified_at' => now()]);
        $prodi1->role()->save(new Role(['name' => 'prodi', 'roleable_id' => '2', 'roleable_type' => 'App\Models\Prodi']));
        $jurusan1 = User::create(['name' => 'Admin Jurusan', 'email' => 'jurusan1', 'password' => bcrypt('1234qwer'),  'email_verified_at' => now()]);
        $jurusan1->role()->save(new Role(['name' => 'jurusan', 'roleable_id' => '1', 'roleable_type' => 'App\Models\Jurusan']));

        Sektor::create(['nama' => 'Perdagangan Besar dan Eceran']);
        Sektor::create(['nama' => 'Reparasi dan Perawatan Mobil dan Sepeda Motor']);

        Sifat::create(['nama' => 'Nasional']);
        Sifat::create(['nama' => 'Internasional']);

        Jenis::create(['nama' => 'Pemerintahan']);
        Jenis::create(['nama' => 'Dudi']);
        Jenis::create(['nama' => 'Sekolah']);
        Jenis::create(['nama' => 'Perguruan Tinggi']);
        Jenis::create(['nama' => 'Organisasi']);

        Kriteria::create(['nama' => 'Perusahaan Swasta']);
        Kriteria::create(['nama' => 'Perusahaan Negeri']);

        Jurusan::create(['nama' => 'Pariwisata']);
        Jurusan::create(['nama' => 'Teknik Elektro']);
        Jurusan::create(['nama' => 'Administrasi Bisnis']);
        Jurusan::create(['nama' => 'Akuntansi']);
        Jurusan::create(['nama' => 'Teknik Mesin']);
        Jurusan::create(['nama' => 'Teknik Sipil']);

        Prodi::create(['nama' => 'Usaha Perjalanan Wisata', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Perhotelan', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Manajemen Bisnis Pariwisata', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Perencanaan Pariwisata', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Teknik Listrik', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Manajemen Informatika', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Teknik Otomasi', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Teknologi Rekayasa Perangkat Lunak', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Administrasi Bisnis', 'jurusan_id' => 3]);
        Prodi::create(['nama' => 'Manajemen Bisnis Internasional', 'jurusan_id' => 3]);
        Prodi::create(['nama' => 'Bisnis Digital', 'jurusan_id' => 3]);
        Prodi::create(['nama' => 'Akuntansi', 'jurusan_id' => 4]);
        Prodi::create(['nama' => 'Akuntansi Manajerial', 'jurusan_id' => 4]);
        Prodi::create(['nama' => 'Akuntansi Perpajakan', 'jurusan_id' => 4]);
        Prodi::create(['nama' => 'Teknik Mesin', 'jurusan_id' => 5]);
        Prodi::create(['nama' => 'Teknik Pendingin dan Tata Udara', 'jurusan_id' => 5]);
        Prodi::create(['nama' => 'Teknologi Rekayasa Utilitas', 'jurusan_id' => 5]);
        Prodi::create(['nama' => 'Teknik Sipil', 'jurusan_id' => 6]);
        Prodi::create(['nama' => 'Manajemen Proyek Kontruksi', 'jurusan_id' => 6]);
        Prodi::create(['nama' => 'Administrasi Jaringan Komputer', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Rekayasa Perancangan Mekanik', 'jurusan_id' => 5]);
        Prodi::create(['nama' => 'Instalasi dan Pemeliharaan Kabel Bertegangan Rendah', 'jurusan_id' => 2]);
        Prodi::create(['nama' => 'Manajemen Operasi Bisnis Digital', 'jurusan_id' => 3]);
        Prodi::create(['nama' => 'Operasionalisasi Perkantoran Digital', 'jurusan_id' => 3]);
        Prodi::create(['nama' => 'Administrasi Perpajakan', 'jurusan_id' => 4]);
        Prodi::create(['nama' => 'Teknik Manufaktur Mesin', 'jurusan_id' => 5]);
        Prodi::create(['nama' => 'Teknik Rekayasa Kontruksi Bangunan Gedung', 'jurusan_id' => 6]);
        Prodi::create(['nama' => 'Teknik Rekayasa Kontruksi Bangunan Air', 'jurusan_id' => 6]);
        Prodi::create(['nama' => 'Fondasi, Beton, dan Pengaspalan Jalan', 'jurusan_id' => 6]);
        Prodi::create(['nama' => 'Perhotelan PSDKU Lombok Barat', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Perhotelan PSDKU Karangasem', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Perhotelan PSDKU Jembrana', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Perhotelan PSDKU Gianyar', 'jurusan_id' => 1]);
        Prodi::create(['nama' => 'Bahasa Inggris untuk Komunikasi Bisnis dan Profesional', 'jurusan_id' => 3]);

        Kategori::create(['nama' => 'Penyelarasan Kurikulum']);
        Kategori::create(['nama' => 'Project Based Learning (PjBL)']);
        Kategori::create(['nama' => 'Teaching Factory  (TEFA)']);
        Kategori::create(['nama' => 'Data Dosen / Tenaga Ahli dari Dunia Kerja (Dosen Tamu)']);
        Kategori::create(['nama' => 'Kelas Industri']);
        Kategori::create(['nama' => 'Magang Dosen']);
        Kategori::create(['nama' => 'Magang Mahasiswa']);
        Kategori::create(['nama' => 'Sertifikasi Kompetensi']);
        Kategori::create(['nama' => 'Pelatihan dari Dunia Kerja']);
        Kategori::create(['nama' => 'Riset']);
        Kategori::create(['nama' => 'Penyerapan Lulusan']);
        Kategori::create(['nama' => 'Beasiswa/Ikatan Dinas']);
        Kategori::create(['nama' => 'Corporate Social Responsibility (CSR)']);
        Kategori::create(['nama' => 'Pertukaran Mahasiswa']);
        Kategori::create(['nama' => 'Pertukaran Dosen ']);
        Kategori::create(['nama' => 'Konferensi']);
        Kategori::create(['nama' => 'Publikasi Ilmiah']);
        Kategori::create(['nama' => 'Joint Degree']);
        Kategori::create(['nama' => 'Double Degree']);
        Kategori::create(['nama' => 'Short Course']);
        Kategori::create(['nama' => 'Promosi']);
        Kategori::create(['nama' => 'Kunjungan Industri']);
        Kategori::create(['nama' => 'Pengabdian/Pendampingan Masyarakat']);
        Kategori::create(['nama' => 'Kelas kerja antar Politeknik (PT )']);
        Kategori::create(['nama' => 'Pelatihan Kepada Dunia Kerja']);


        $this->call([
            AlamatSeeder::class,
        ]);
        // Mitra::factory(100)->create();
    }
}
