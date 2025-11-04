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
        // Pastikan Anda menggunakan Schema::create, BUKAN Schema::table
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien', 100);
            $table->string('nomor_rekam_medis', 20)->unique();
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};