<?php

namespace App\Http\Controllers;

use App\Models\Layanan; // <-- PENTING
use Illuminate\Http\Request; // <-- Kita pakai ini, bukan StoreLayananRequest
use Illuminate\Validation\Rule; // <-- Kita butuh ini untuk validasi Update

class LayananController extends Controller
{
    /**
     * Tampilkan daftar semua layanan (READ)
     * Sudah lengkap dengan Search dan Pagination.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Layanan::latest();

        if ($search) {
            // Cari berdasarkan nama atau harga
            $query->where('nama_layanan', 'like', '%' . $search . '%')
                  ->orWhere('harga', 'like', '%' . $search . '%');
        }

        $layanans = $query->paginate(10)->appends(['search' => $search]);

        return view('layanan.index', compact('layanans', 'search'));
    }

    /**
     * Tampilkan formulir untuk membuat layanan baru (CREATE form)
     */
    public function create()
    {
        // Hanya tampilkan view formulir
        return view('layanan.create');
    }

    /**
     * Simpan layanan baru ke database (STORE logic)
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string|max:150|unique:layanans',
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric|min:0',
        ]);

        // 2. Simpan data
        Layanan::create($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('layanan.index')
                         ->with('success', 'Data layanan baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail (kita lewati, tidak dipakai)
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Tampilkan formulir untuk mengedit layanan (EDIT form)
     */
    public function edit(Layanan $layanan)
    {
        // Kirim data layanan yang mau diedit ke view formulir
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update layanan di database (UPDATE logic)
     */
    public function update(Request $request, Layanan $layanan)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'nama_layanan' => [
                'required',
                'string',
                'max:150',
                // Pastikan nama unik, KECUALI untuk ID layanan ini sendiri
                Rule::unique('layanans')->ignore($layanan->id),
            ],
            'deskripsi'    => 'nullable|string',
            'harga'        => 'required|numeric|min:0',
        ]);

        // 2. Update data
        $layanan->update($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('layanan.index')
                         ->with('success', 'Data layanan berhasil diperbarui.');
    }

    /**
     * Hapus layanan dari database (DELETE logic)
     */
    public function destroy(Layanan $layanan)
    {
        // 1. Hapus data
        $layanan->delete();

        // 2. Redirect dengan pesan sukses
        return redirect()->route('layanan.index')
                         ->with('success', 'Data layanan berhasil dihapus.');
    }
}