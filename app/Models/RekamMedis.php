<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;   // <-- TAMBAHKAN INI
use App\Models\Layanan; // <-- TAMBAHKAN INI

class RekamMedis extends Model
{
    use HasFactory;

    /**
     * Ganti nama tabel default (karena 'RekamMedis' akan menjadi 'rekam_medis'
     * secara otomatis, tapi ini untuk jaga-jaga).
     */
    protected $table = 'rekam_medis';

    /**
     * Tentukan field mana saja yang boleh diisi.
     */
    protected $fillable = [
        'pasien_id',
        'layanan_id',
        'tanggal_kunjungan',
        'catatan_dokter',
    ];

    /**
     * Definisikan relasi: Satu RekamMedis DIMILIKI OLEH SATU Pasien.
     * (Relasi many-to-one)
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    /**
     * Definisikan relasi: Satu RekamMedis DIMILIKI OLEH SATU Layanan.
     * (Relasi many-to-one)
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}