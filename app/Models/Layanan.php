<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RekamMedis; // <-- TAMBAHKAN INI

class Layanan extends Model
{
    use HasFactory;

    /**
     * Tentukan field mana saja yang boleh diisi.
     */
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
    ];

    /**
     * Definisikan relasi: Satu Layanan BISA ADA DI BANYAK RekamMedis.
     * (Relasi one-to-many)
     */
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}