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
        Schema::create('mou', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('judul');
            $table->foreignId('mitra_id');
            $table->string('jenis_kemitraan');
            $table->string('ruang_lingkup');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir')->nullable();
            $table->text('keterangan');
            $table->string('mou_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou');
    }
};
