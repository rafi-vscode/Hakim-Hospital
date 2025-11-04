<x-app-layout>
    <!-- Header Halaman -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Layanan') }}
        </h2>
    </x-slot>

    <!-- Konten Utama -->
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('layanan.update', $layanan->id) }}">
                        @csrf
                        @method('PUT') <!-- Ini WAJIB untuk Update -->

                        <!-- Nama Layanan -->
                        <div class="mb-4">
                            <label for="nama_layanan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Layanan</label>
                            <input type="text" name="nama_layanan" id="nama_layanan" 
                                   value="{{ old('nama_layanan', $layanan->nama_layanan) }}" 
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required>
                            
                            <!-- KESALAHAN SAYA SEBELUMNYA DI SINI (Lupa ditutup) -->
                            @error('nama_layanan')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga (Rp)</label>
                            <input type="number" name="harga" id="harga" 
                                   value="{{ old('harga', $layanan->harga) }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required min="0">
                            
                            <!-- KESALAHAN SAYA SEBELUMNYA DI SINI (Salah ketik @endKeterangan) -->
                            @error('harga')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi (Opsional)</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                            
                            <!-- KESALAHAN SAYA SEBELUMNYA DI SINI (Salah ketik @endKeterangan) -->
                            @error('deskripsi')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Tombol Simpan & Batal -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <a href="{{ route('layanan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>