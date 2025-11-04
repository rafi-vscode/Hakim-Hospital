<x-app-layout>
    <!-- Header Halaman (Judul) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <!-- Konten Utama -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- 1. KARTU STATISTIK CEPAT (4 KOLOM) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Kartu Total Pasien -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pasien</h3>
                    <p class="text-3xl font-semibold text-gray-900 dark:text-gray-100 mt-2">{{ $totalPasien }}</p>
                </div>
                <!-- Kartu Rawat Inap -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Pasien Rawat Inap</h3>
                    <p class="text-3xl font-semibold text-yellow-600 dark:text-yellow-500 mt-2">{{ $pasienRawatInap }}</p>
                </div>
                <!-- Kartu Rawat Jalan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Pasien Rawat Jalan</h3>
                    <p class="text-3xl font-semibold text-blue-600 dark:text-blue-500 mt-2">{{ $pasienRawatJalan }}</p>
                </div>
                <!-- KARTU TOTAL LAYANAN (BARU) -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Layanan</h3>
                    <p class="text-3xl font-semibold text-green-600 dark:text-green-500 mt-2">{{ $totalLayanan }}</p>
                </div>
            </div>

            <!-- 2. TOMBOL AKSI CEPAT & DAFTAR PASIEN TERBARU -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Kolom Kiri: Aksi Cepat -->
                <div class="lg:col-span-1">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Aksi Cepat</h2>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm sm:rounded-lg flex flex-col space-y-4">
                        <a href="{{ route('pasien.create') }}" class="w-full text-center bg-blue-600 text-white px-5 py-3 rounded-lg font-medium shadow hover:bg-blue-700 transition duration-300">
                            + Tambah Pasien Baru
                        </a>
                        <a href="{{ route('layanan.create') }}" class="w-full text-center bg-indigo-600 text-white px-5 py-3 rounded-lg font-medium shadow hover:bg-indigo-700 transition duration-300">
                            + Tambah Layanan Baru
                        </a>
                    </div>
                </div>

                <!-- Kolom Kanan: Pasien Terbaru -->
                <div class="lg:col-span-2">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Pasien Terbaru</h2>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm sm:rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Nama Pasien</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">No. Rekam Medis</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($pasienTerbaru as $pasien)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $pasien->nama_pasien }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $pasien->nomor_rekam_medis }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $pasien->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada data pasien.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="bg-gray-50 dark:bg-gray-700 px-6 py-3 border-t dark:border-gray-600 text-right">
                            <a href="{{ route('pasien.index') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800">
                                Lihat Semua Pasien &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>