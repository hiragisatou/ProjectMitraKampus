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
        Schema::create('verify_mou', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mou_id');
            $table->foreignId('admin_id');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->string('valid_mou_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verify_mou');
    }
};
