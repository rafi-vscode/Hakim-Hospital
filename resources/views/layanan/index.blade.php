<x-app-layout>
    <!-- Header Halaman -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Layanan') }}
        </h2>
    </x-slot>

    <!-- Konten Utama -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Tampilkan Pesan Sukses (jika ada) -->
            @if (session('success'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tombol Tambah Layanan Baru -->
            <div class="mb-6">
                <!-- Link ini akan mengarah ke fungsi 'create' yang sudah kita siapkan -->
                <a href="{{ route('layanan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    + Tambah Layanan Baru
                </a>
            </div>

            <!-- Formulir Pencarian -->
            <div class="mb-4">
                <form method="GET" action="{{ route('layanan.index') }}">
                    <div class="flex">
                        <input type="text" name="search"
                               class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                               placeholder="Cari berdasarkan nama layanan atau harga..."
                               value="{{ $search ?? '' }}">
                               
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-r-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:border-gray-900 dark:focus:border-gray-300 focus:ring ring-gray-300 dark:focus:ring-gray-500 disabled:opacity-25 transition">
                            Cari
                        </button>
                    </div>
                </form>
            </div>


            <!-- Kontainer Tabel -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-0">
                    
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Layanan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            
                            <!-- 
                              Looping data layanan.
                              Variabel $layanans ini kita dapat dari Controller.
                            -->
                            @forelse ($layanans as $layanan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $layanan->nama_layanan }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $layanan->deskripsi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <!-- Link untuk Edit -->
                                        <a href="{{ route('layanan.edit', $layanan->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Edit</a>
                                        
                                        <!-- Tombol Hapus (sebagai Form) -->
                                        <form class="inline" method="POST" action="{{ route('layanan.destroy', $layanan->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data layanan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 ml-4" style="background:none; border:none; padding:0; cursor:pointer;">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <!-- Tampilkan ini jika tidak ada data -->
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                        @if ($search)
                                            Data layanan dengan kueri "{{ $search }}" tidak ditemukan.
                                        @else
                                            Belum ada data layanan.
                                        @endif
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
            
            <!-- Link Paginasi (jika data lebih dari 10) -->
            <div class="mt-6">
                {{ $layanans->links() }}
            </div>

        </div>
    </div>
</x-app-layout>