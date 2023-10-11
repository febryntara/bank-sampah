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
        Schema::create('tb_setoran_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('sampah_id');
            $table->integer('jumlah');
            $table->integer('hasil');
            $table->enum('status', ['dibuat', 'diterima', 'uang_diambil'])->default('dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_setoran_sampah');
    }
};
