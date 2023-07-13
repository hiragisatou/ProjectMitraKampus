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
        Schema::create('pengajuanKemitraan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('mitra_id');
            $table->string('jenisKemitraan');
            $table->string('ruangLingkup');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_berakhir')->nullable();
            $table->foreignId('prodi_id');
            $table->text('keterangan');
            $table->string('file_mou');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuanKemitraan');
    }
};
