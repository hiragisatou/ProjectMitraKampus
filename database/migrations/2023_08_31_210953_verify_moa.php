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
        Schema::create('verify_moa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moa_id');
            $table->foreignId('admin_id');
            $table->string('status');
            $table->string('send_to');
            $table->string('valid_moa_file')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verify_moa');
    }
};
