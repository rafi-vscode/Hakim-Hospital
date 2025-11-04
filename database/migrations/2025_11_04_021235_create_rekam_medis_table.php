<?php
// Ini adalah file ..._create_rekam_medis_table.php

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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();

            // 1. Kunci Relasi ke Tabel Pasiens
            // 'foreignId' adalah cara Laravel membuat 'unsignedBigInteger'
            // 'constrained' memberitahu bahwa ini terhubung ke tabel 'pasiens'
            // 'onDelete('cascade')' berarti: jika data Pasien dihapus, 
            // semua rekam medis miliknya juga akan ikut terhapus.
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');

            // 2. Kunci Relasi ke Tabel Layanans
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');

            // 3. Kolom Tambahan (Data Ekstra)
            $table->date('tanggal_kunjungan'); // Kapan kunjungan ini terjadi
            $table->text('catatan_dokter')->nullable(); // Diagnosa atau catatan (opsional)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};