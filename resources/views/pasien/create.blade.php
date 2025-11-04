<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('pasien.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Upload Foto -->
                        <div class="mb-4">
                            <label for="foto_profil" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Profil (Max 2MB)</label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                   class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-700 focus:outline-none"/>
                            @error('foto_profil')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nama Pasien -->
                        <div class="mb-4">
                            <label for="nama_pasien" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" value="{{ old('nama_pasien') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                   required>
                            @error('nama_pasien')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Rekam Medis -->
                        <div class="mb-4">
                            <label for="nomor_rekam_medis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Rekam Medis</label>
                            <input type="text" name="nomor_rekam_medis" id="nomor_rekam_medis" value="{{ old('nomor_rekam_medis') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                   required>
                            @error('nomor_rekam_medis')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                   required>
                            @error('tanggal_lahir')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                      required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <a href="{{ route('pasien.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300">
                                Batal
                            </a>

                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold text-xs hover:bg-indigo-700">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
