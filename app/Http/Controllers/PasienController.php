<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Pasien::latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_pasien', 'like', "%$search%")
                  ->orWhere('nomor_rekam_medis', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        }

        $pasiens = $query->paginate(10)->appends(['search' => $search]);

        return view('pasien.index', compact('pasiens', 'search'));
    }

    public function create()
    {
        $statusOptions = Pasien::$statusOptions;
        return view('pasien.create', compact('statusOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pasien'       => 'required|string|max:100',
            'nomor_rekam_medis' => 'required|string|max:20|unique:pasiens',
            'tanggal_lahir'     => 'required|date',
            'alamat'            => 'required|string',
            'status'            => 'required|string',
            'foto_profil'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            $foto = $request->file('foto_profil');
            $namaFile = time() . '-' . $foto->getClientOriginalName();

            // Simpan file ke storage/app/public/photos
            $path = $foto->storeAs('photos', $namaFile, 'public');

            // Simpan path ke database
            $validatedData['foto_profil'] = $path;
        }

        Pasien::create($validatedData);

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien baru berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        $statusOptions = Pasien::$statusOptions;
        return view('pasien.edit', compact('pasien', 'statusOptions'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nama_pasien'       => 'required|string|max:100',
            'nomor_rekam_medis' => ['required', 'string', 'max:20', Rule::unique('pasiens')->ignore($pasien->id)],
            'tanggal_lahir'     => 'required|date',
            'alamat'            => 'required|string',
            'status'            => 'required|string',
            'foto_profil'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($pasien->foto_profil && Storage::disk('public')->exists($pasien->foto_profil)) {
                Storage::disk('public')->delete($pasien->foto_profil);
            }

            $foto = $request->file('foto_profil');
            $namaFile = time() . '-' . $foto->getClientOriginalName();
            $path = $foto->storeAs('photos', $namaFile, 'public');

            $validatedData['foto_profil'] = $path;
        }

        $pasien->update($validatedData);

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        if ($pasien->foto_profil && Storage::disk('public')->exists($pasien->foto_profil)) {
            Storage::disk('public')->delete($pasien->foto_profil);
        }

        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
}
