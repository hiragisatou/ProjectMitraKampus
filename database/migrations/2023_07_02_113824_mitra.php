<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('kriteriaMitra_id');
            $table->string('nomorIndukBerusaha');
            $table->foreignId('sektorIndustri_id');
            $table->foreignId('sifat_id');
            $table->foreignId('jenis_id');
            $table->foreignId('kategori_id');
            $table->foreignId('user_id');
            $table->string('klasifikasi');
            $table->string('jumlahPegawai');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('urlWeb')->nullable();
            $table->string('email')->nullable();
            $table->string('noTelp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
