<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Layanan; // <-- 1. TAMBAHKAN 'use Layanan'

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data statistik.
     */
    public function index()
    {
        // --- 1. Kartu Statistik Cepat ---
        try {
            $totalPasien = Pasien::count();
            $pasienRawatInap = Pasien::where('status', 'Rawat Inap')->count();
            $pasienRawatJalan = Pasien::where('status', 'Rawat Jalan')->count();
            
            // 2. AKTIFKAN LAGI INI
            $totalLayanan = Layanan::count(); 

        } catch (\Exception $e) {
            $totalPasien = 0;
            $pasienRawatInap = 0;
            $pasienRawatJalan = 0;
            $totalLayanan = 0; // Set ke 0 jika error
        }

        // --- 2. Daftar Pasien Terbaru ---
        try {
            $pasienTerbaru = Pasien::latest()->take(5)->get();
        } catch (\Exception $e) {
            $pasienTerbaru = collect(); 
        }

        // --- 3. Kirim semua data ke View 'dashboard' ---
        return view('dashboard', [
            'totalPasien' => $totalPasien,
            'pasienRawatInap' => $pasienRawatInap,
            'pasienRawatJalan' => $pasienRawatJalan,
            'totalLayanan' => $totalLayanan, // <-- 3. KIRIM DATA 'totalLayanan'
            'pasienTerbaru' => $pasienTerbaru,
        ]);
    }
}