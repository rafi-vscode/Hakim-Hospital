<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RekamMedis; // <-- TAMBAHKAN INI

class Pasien extends Model
{
    use HasFactory;

    /**
     * Tentukan field mana saja yang boleh diisi secara massal.
     */
    protected $fillable = [
        'nama_pasien',
        'nomor_rekam_medis',
        'tanggal_lahir',
        'alamat',
        'status',
        'foto_profil',
    ];

    /**
     * Definisikan opsi status secara terpusat
     */
    public static $statusOptions = [
        'Darurat',
        'Rawat Inap',
        'Rawat Jalan',
        'Selesai',
        'Dirujuk',
    ];

    /**
     * Definisikan relasi: Satu Pasien BISA MEMILIKI BANYAK RekamMedis.
     * (Relasi one-to-many)
     */
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}