<x-app-layout>
    <!-- Header Halaman -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Catatan Rekam Medis') }}
        </h2>
    </x-slot>

    <!-- Konten Utama -->
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- 
                      Formulir ini akan mengirim data ke route('rekam-medis.store'),
                      yang akan memicu fungsi 'store()' di RekamMedisController.
                    -->
                    <form method="POST" action="{{ route('rekam-medis.store') }}">
                        @csrf

                        <!-- Pilih Pasien (Dropdown dari Relasi) -->
                        <div class="mb-4">
                            <label for="pasien_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Pasien</label>
                            <select name="pasien_id" id="pasien_id" 
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required>
                                <option value="">-- Pilih Pasien --</option>
                                <!-- Kita looping $pasiens yang dikirim dari Controller -->
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}" {{ old('pasien_id') == $pasien->id ? 'selected' : '' }}>
                                        {{ $pasien->nama_pasien }} (RM: {{ $pasien->nomor_rekam_medis }})
                                    </option>
                                @endforeach
                            </select>
                            @error('pasien_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pilih Layanan (Dropdown dari Relasi) -->
                        <div class="mb-4">
                            <label for="layanan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Layanan</label>
                            <select name="layanan_id" id="layanan_id" 
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required>
                                <option value="">-- Pilih Layanan --</option>
                                <!-- Kita looping $layanans yang dikirim dari Controller -->
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->id }}" {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                                        {{ $layanan->nama_layanan }} (Rp {{ number_format($layanan->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('layanan_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Kunjungan -->
                        <div class="mb-4">
                            <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required>
                            @error('tanggal_kunjungan')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Catatan Dokter -->
                        <div class="mb-4">
                            <label for="catatan_dokter" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catatan Dokter (Opsional)</label>
                            <textarea name="catatan_dokter" id="catatan_dokter" rows="4" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('catatan_dokter') }}</textarea>
                            @error('catatan_dokter')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Tombol Simpan & Batal -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <a href="{{ route('rekam-medis.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Simpan Catatan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>