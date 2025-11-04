<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('pasien.update', $pasien->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Foto Profil Sekarang -->
                        <div class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Foto Profil Saat Ini</label>

                            @if ($pasien->foto_profil)
                                <img src="{{ asset('storage/' . $pasien->foto_profil) }}"
                                     class="h-24 w-24 rounded-full object-cover border-2 border-indigo-500 dark:border-indigo-400"
                                     alt="Foto Profil Pasien">
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada foto.</p>
                            @endif
                        </div>

                        <!-- Upload Foto Baru -->
                        <div class="mb-4">
                            <label for="foto_profil" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Ganti Foto Profil (Max 2MB)
                            </label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                   class="mt-1 block w-full text-sm border border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-700 focus:outline-none" />
                            
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Kosongkan jika tidak ingin mengganti.
                            </p>
                            @error('foto_profil')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pasien</label>
                            <input type="text" name="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm"
                                   required />
                            @error('nama_pasien')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Rekam Medis -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Rekam Medis</label>
                            <input type="text" name="nomor_rekam_medis"
                                   value="{{ old('nomor_rekam_medis', $pasien->nomor_rekam_medis) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm"
                                   required />
                            @error('nomor_rekam_medis')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm"
                                   required />
                            @error('tanggal_lahir')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                            <textarea name="alamat" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm"
                                      required>{{ old('alamat', $pasien->alamat) }}</textarea>
                            @error('alamat')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', $pasien->status) == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <a href="{{ route('pasien.index') }}"
                               class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-xs hover:bg-gray-400 dark:hover:bg-gray-600">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs rounded-md font-semibold">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
