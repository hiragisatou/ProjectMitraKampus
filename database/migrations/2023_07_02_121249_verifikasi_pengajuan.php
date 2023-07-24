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
        Schema::create('verifikasiPengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuanKemitraan_id');
            $table->foreignId('admin_id');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->string('valid_mou')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasiPengajuan');
    }
};
