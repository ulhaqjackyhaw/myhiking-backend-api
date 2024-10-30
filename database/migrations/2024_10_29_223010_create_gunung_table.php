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
        Schema::create('gunung', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('province_id')->nullable(); // Menjadikan province_id nullable
            $table->unsignedBigInteger('regency_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('nama'); // Nama gunung
            $table->text('deskripsi'); // Deskripsi gunung
            $table->integer('ketinggian')->default(0); // Ketinggian gunung
            $table->string('gambar'); // Menyimpan path gambar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gunung');
    }
};
