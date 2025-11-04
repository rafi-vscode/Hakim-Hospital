<?php

namespace App\Http\Controllers;

// MODEL YANG KITA BUTUHKAN
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Layanan;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Tampilkan daftar semua rekam medis (READ)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mulai query, 'with' adalah Eager Loading.
        // Ini mengambil data RekamMedis SEKALIGUS data Pasien & Layanan terkait.
        // Jauh lebih cepat daripada query N+1.
        $query = RekamMedis::with(['pasien', 'layanan'])->latest();

        if ($search) {
            // Jika ada pencarian, kita cari di relasi (di nama pasien)
            $query->whereHas('pasien', function ($q) use ($search) {
                $q->where('nama_pasien', 'like', '%' . $search . '%');
            })
            // Atau cari di relasi layanan
            ->orWhereHas('layanan', function ($q) use ($search) {
                $q->where('nama_layanan', 'like', '%' . $search . '%');
            });
        }

        $rekamMedis = $query->paginate(10)->appends(['search' => $search]);

        return view('rekam-medis.index', compact('rekamMedis', 'search'));
    }

    /**
     * Tampilkan formulir untuk membuat rekam medis baru (CREATE form)
     */
    public function create()
    {
        // Kita butuh daftar SEMUA pasien dan SEMUA layanan
        // untuk ditampilkan di dropdown formulir.
        $pasiens = Pasien::orderBy('nama_pasien', 'asc')->get();
        $layanans = Layanan::orderBy('nama_layanan', 'asc')->get();

        return view('rekam-medis.create', compact('pasiens', 'layanans'));
    }

    /**
     * Simpan rekam medis baru ke database (STORE logic)
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'pasien_id'         => 'required|exists:pasiens,id',
            'layanan_id'        => 'required|exists:layanans,id',
            'tanggal_kunjungan' => 'required|date',
            'catatan_dokter'    => 'nullable|string',
        ]);

        // Simpan data
        RekamMedis::create($validatedData);

        return redirect()->route('rekam-medis.index')
                         ->with('success', 'Catatan rekam medis baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan (kita lewati, tidak dipakai)
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Tampilkan formulir untuk mengedit rekam medis (EDIT form)
     */
    public function edit(RekamMedis $rekamMedis)
    {
        // Sama seperti create, kita butuh daftar pasien & layanan
        $pasiens = Pasien::orderBy('nama_pasien', 'asc')->get();
        $layanans = Layanan::orderBy('nama_layanan', 'asc')->get();

        // Kirim data rekam medis yang mau diedit, DAN daftarnya
        return view('rekam-medis.edit', compact('rekamMedis', 'pasiens', 'layanans'));
    }

    /**
     * Update rekam medis di database (UPDATE logic)
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        // Validasi data
        $validatedData = $request->validate([
            'pasien_id'         => 'required|exists:pasiens,id',
            'layanan_id'        => 'required|exists:layanans,id',
            'tanggal_kunjungan' => 'required|date',
            'catatan_dokter'    => 'nullable|string',
        ]);

        // Update data
        $rekamMedis->update($validatedData);

        return redirect()->route('rekam-medis.index')
                         ->with('success', 'Catatan rekam medis berhasil diperbarui.');
    }

    /**
     * Hapus rekam medis dari database (DELETE logic)
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        $rekamMedis->delete();

        return redirect()->route('rekam-medis.index')
                         ->with('success', 'Catatan rekam medis berhasil dihapus.');
    }
}