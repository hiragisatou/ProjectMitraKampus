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
        Schema::create('moa', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('judul');
            $table->foreignId('mou_id')->nullable();
            $table->foreignId('mitra_id');
            $table->foreignId('jurusan_id');
            $table->dateTime('checked')->nullable();
            $table->string('send_to');
            $table->string('prodi_id');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir')->nullable();
            $table->string('moa_file');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moa');
    }
};
