<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts --><link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->@vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .glass-background {
                position: relative; /* Diperlukan untuk pseudo-element */
                background-color: #111827; /* Fallback jika gambar gagal dimuat */
            }
            .glass-background::before {
                content: "";
                position: fixed; /* atau 'absolute' jika 'fixed' bermasalah */
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: url('{{ asset('images/pexels-tomfisk-1692693.jpg') }}'); /* Ganti dengan nama file gambar Anda */
                background-size: cover;
                background-position: center;
                filter: blur(8px); /* EFEK BLUR DI SINI */
                -webkit-filter: blur(8px);
                z-index: -1; /* Posisikan di belakang konten */
            }
            .solid-card {
                background-color: rgba(255, 255, 255, 0.9); /* Kartu putih semi-transparan */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .dark .solid-card {
                 background-color: rgba(31, 41, 55, 0.85); /* Kartu abu-abu gelap semi-transparan (dark:bg-gray-700) */
                 border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            }
        </style>
    </head>
    <!-- Tambahkan class 'glass-background' ke body --><body class="font-sans text-gray-900 dark:text-gray-100 antialiased glass-background">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <!-- Logo Teks Hakim Hospital (Tambahkan text-shadow dan ubah warna) --><div>
                <a href="/">
                   <span class="text-2xl font-bold text-indigo-400 text-shadow">Hakim Hospital</span>
                </a>
            </div>

            <!-- Kartu Form (Login/Register) - Ganti 'glass-card' menjadi 'solid-card' --><div class="w-full sm:max-w-md mt-6 px-6 py-4 solid-card shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

