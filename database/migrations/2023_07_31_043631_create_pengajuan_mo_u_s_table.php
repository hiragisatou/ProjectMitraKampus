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
        Schema::create('pengajuan_mou', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('mitra_id');
            $table->string('jenis_kemitraan');
            $table->string('ruang_lingkup');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_berakhir')->nullable();
            $table->foreignId('prodi_id');
            $table->text('keterangan');
            $table->string('mou');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_mo_u_s');
    }
};
