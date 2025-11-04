<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Hakim Hospital - Pelayanan Kesehatan Terpadu</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Alpine.js (di-defer agar dimuat setelah DOM) -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    
    <body class="antialiased font-sans bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 overflow-x-hidden scroll-behavior-smooth">
        
        <div class="min-h-screen">
            
            <!-- ====== Navbar (Sudah Responsif) ====== -->
            <header x-data="{ mobileMenuOpen: false, scrolled: false }"
                    @scroll.window="scrolled = (window.scrollY > 10)"
                    :class="{ 'bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm shadow-md': scrolled, 'bg-transparent': !scrolled }"
                    class="fixed inset-x-0 top-0 z-50 transition-colors duration-300">
                <nav class="flex items-center justify-between p-6 lg:px-8 max-w-7xl mx-auto" aria-label="Global">
                    <!-- Logo -->
                    <div class="flex lg:flex-1">
                        <a href="/" class="-m-1.5 p-1.5">
                            <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Hakim Hospital</span>
                        </a>
                    </div>
                    
                    <!-- Tombol Hamburger (Hanya Tampil di Mobile) -->
                    <div class="flex lg:hidden">
                        <button 
                            type="button" 
                            @click="mobileMenuOpen = true" 
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 dark:text-gray-300">
                            <span class="sr-only">Buka menu utama</span>
                            <!-- Icon Hamburger -->
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>

                    <!-- Menu Navigasi (Tengah - Hanya Tampil di Desktop) -->
                    <div class="hidden lg:flex lg:gap-x-12">
                        <a href="#" class="text-sm font-semibold leading-6 hover:text-indigo-600">Home</a>
                        <a href="#layanan" class="text-sm font-semibold leading-6 hover:text-indigo-600">Layanan</a>
                        <a href="#tentang" class="text-sm font-semibold leading-6 hover:text-indigo-600">Tentang Kami</a>
                        <a href="#dokter" class="text-sm font-semibold leading-6 hover:text-indigo-600">Tim Dokter</a>
                    </div>

                    <!-- Tombol Login/Register (Hanya Tampil di Desktop) -->
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold px-3 py-2">Log in <span aria-hidden="true">&rarr;</span></a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </nav>

                <!-- Panel Menu Mobile -->
                <div 
                    x-show="mobileMenuOpen" 
                    @click.away="mobileMenuOpen = false" 
                    class="lg:hidden" 
                    role="dialog" 
                    aria-modal="true"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    >
                    <div class="fixed inset-0 z-50 bg-black/30" aria-hidden="true"></div>
                    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                        <div class="flex items-center justify-between">
                            <a href="/" class="-m-1.5 p-1.5">
                                <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Hakim Hospital</span>
                            </a>
                            <button 
                                type="button" 
                                @click="mobileMenuOpen = false" 
                                class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-300">
                                <span class="sr-only">Tutup menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/10 dark:divide-gray-500/25">
                                <div class="space-y-2 py-6">
                                    <a href="#" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Home</a>
                                    <a href="#layanan" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Layanan</a>
                                    <a href="#tentang" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Tentang Kami</a>
                                    <a href="#dokter" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Tim Dokter</a>
                                </div>
                                <div class="py-6">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Log in</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 hover:bg-gray-50 dark:hover:bg-gray-800">Register</a>
                                            @endif
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    
            <main class="relative isolate pt-14">
                <!-- Latar belakang gradasi (dekoratif) -->
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#80ff95] to-[#3b82f6] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>

                <!-- Konten Hero -->
                <div class="py-24 sm:py-32 lg:pb-40">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <h1 class="text-4xl font-bold tracking-tight sm:text-6xl">Pelayanan Kesehatan Terbaik untuk Anda</h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Kami mendedikasikan diri untuk kesehatan dan kesembuhan Anda dengan standar pelayanan medis tertinggi, didukung oleh dokter profesional dan teknologi modern.</p>
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat Janji Temu</a>
                                <a href="#layanan" class="text-sm font-semibold leading-6">Layanan Kami <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                        

                        <img src="{{ asset('images/pexels-tomfisk-1692693.jpg') }}" 
                             alt="Gedung Rumah Sakit" 
                             class="mt-16 sm:mt-24 rounded-2xl shadow-xl aspect-[2/1] w-full object-cover">

                    </div>
                </div>
            </main>
            <!-- ====== Akhir Hero Section ====== -->


            <!-- ====== Bagian Layanan ====== -->
            <section id="layanan" class="bg-white dark:bg-gray-800 py-24 sm:py-32 scroll-m-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:text-center">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600 dark:text-indigo-400">Layanan Kami</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">Fasilitas Lengkap untuk Semua Kebutuhan</p>
                    </div>
                    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8">
                        
                        <!-- Kartu Layanan 1 -->
                        <div class="flex flex-col items-start rounded-lg bg-gray-50 dark:bg-gray-900/50 p-6 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-2 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h3 class="mt-4 text-lg font-semibold">UGD 24 Jam</h3>
                            <p class="mt-2 text-base leading-7 text-gray-600 dark:text-gray-300">Penanganan darurat cepat dan tepat oleh tim medis profesional kapanpun Anda butuhkan.</p>
                        </div>
                        
                        <!-- Kartu Layanan 2 -->
                        <div class="flex flex-col items-start rounded-lg bg-gray-50 dark:bg-gray-900/50 p-6 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-2 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A1.5 1.5 0 0 1 18 21.75H6a1.5 1.5 0 0 1-1.499-1.632Z" />
                                </svg>
                            </div>
                            <h3 class="mt-4 text-lg font-semibold">Dokter Spesialis</h3>
                            <p class="mt-2 text-base leading-7 text-gray-600 dark:text-gray-300">Konsultasi dengan dokter ahli di berbagai bidang, dari penyakit dalam, anak, hingga bedah.</p>
                        </div>
                        
                        <!-- Kartu Layanan 3 -->
                        <div class="flex flex-col items-start rounded-lg bg-gray-50 dark:bg-gray-900/50 p-6 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-2 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 15.75 5.25-5.25L8.25 5.25m7.5 10.5-5.25-5.25L15.75 5.25" />
                                </svg>
                            </div>
                            <h3 class="mt-4 text-lg font-semibold">Laboratorium</h3>
                            <p class="mt-2 text-base leading-7 text-gray-600 dark:text-gray-300">Pemeriksaan laboratorium dan radiologi dengan teknologi canggih untuk hasil yang akurat.</p>
                        </div>

                    </div>
                </div>
            </section>
            <!-- ====== Akhir Bagian Layanan ====== -->
            
            
            <!-- ====== Bagian Tentang Kami ====== -->
            <section id="tentang" class="py-24 sm:py-32 scroll-m-20">
                 <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 items-center">
                        <div class="lg:pr-8 lg:pt-4">
                            <div class="lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-indigo-600 dark:text-indigo-400">Tentang Kami</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">Visi Kami untuk Kesehatan Anda</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Sejak berdiri, Hakim Hospital berkomitmen untuk menjadi mitra terpercaya bagi kesehatan masyarakat. Kami percaya bahwa setiap individu berhak mendapatkan pelayanan kesehatan berkualitas tinggi, manusiawi, dan penuh kasih.</p>
                                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 dark:text-gray-300 lg:max-w-none">
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold">
                                            <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" /></svg>
                                            Teknologi Modern.
                                        </dt>
                                        <dd class="inline">Kami selalu memperbarui peralatan medis kami.</dd>
                                    </div>
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold">
                                            <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                                            Tim Profesional.
                                        </dt>
                                        <dd class="inline">Dokter dan perawat kami adalah yang terbaik di bidangnya.</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <img src="{{ asset('images/hakim.png') }}" alt="Dokter sedang bekerja" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0 aspect-video object-cover" width="2432" height="1442">
                    </div>
                </div>
            </section>
            <!-- ====== Akhir Bagian Tentang Kami ====== -->


            <!-- ====== Bagian Tim Dokter ====== -->
            <section id="dokter" class="bg-white dark:bg-gray-800 py-24 sm:py-32 scroll-m-20">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:text-center">
                        <h2 class="text-base font-semibold leading-7 text-indigo-600 dark:text-indigo-400">Tim Kami</h2>
                        <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">Temui Dokter Spesialis Kami</p>
                        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Kami bangga memiliki tim dokter yang berdedikasi, bersertifikat, dan berpengalaman di bidangnya masing-masing.</p>
                    </div>
                    <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        
                        <!-- Dokter 1 -->
                        <li>
                            <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.pexels.com/photos/5327921/pexels-photo-5327921.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Foto Dokter 2">
                            <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight">Dr. Ahmad Subagyo, Sp.PD</h3>
                            <p class="text-base leading-7 text-gray-600 dark:text-gray-300">Spesialis Penyakit Dalam</p>
                        </li>

                        <!-- Dokter 2 -->
                        <li>
                            <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=2070&auto=format&fit=crop" alt="Foto Dokter 2">
                            <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight">Dr. Citra Lestari, Sp.A</h3>
                            <p class="text-base leading-7 text-gray-600 dark:text-gray-300">Spesialis Anak</p>
                        </li>

                        <!-- Dokter 3 -->
                        <li>
                            <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=2070&auto=format&fit=crop" alt="Foto Dokter 3">
                            <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight">Dr. Budi Hartono, Sp.B</h3>
                            <p class="text-base leading-7 text-gray-600 dark:text-gray-300">Spesialis Bedah Umum</p>
                        </li>

                    </ul>
                </div>
            </section>
            <!-- ====== Akhir Bagian Tim Dokter ====== -->


            <!-- ====== Footer ====== -->
            <footer class="bg-gray-900 dark:bg-black" aria-labelledby="footer-heading">
                <h2 id="footer-heading" class="sr-only">Footer</h2>
                <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
                    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                        <div class="space-y-8">
                            <span class="text-2xl font-bold text-white">Hakim Hospital</span>
                            <p class="text-sm leading-6 text-gray-300">Komitmen kami adalah untuk kesehatan Anda dan keluarga.</p>
                        </div>
                        <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h3 class="text-sm font-semibold leading-6 text-white">Layanan</h3>
                                    <ul role="list" class="mt-6 space-y-4">
                                        <li><a href="#layanan" class="text-sm leading-6 text-gray-300 hover:text-white">UGD 24 Jam</a></li>
                                        <li><a href="#layanan" class.sem-leading-6 text-gray-300 hover:text-white">Dokter Spesialis</a></li>
                                        <li><a href="#layanan" class="text-sm leading-6 text-gray-300 hover:text-white">Laboratorium</a></li>
                                    </ul>
                                </div>
                                <div class="mt-10 md:mt-0">
                                    <h3 class="text-sm font-semibold leading-6 text-white">Informasi</h3>
                                    <ul role="list" class="mt-6 space-y-4">
                                        <li><a href="#tentang" class="text-sm leading-6 text-gray-300 hover:text-white">Tentang Kami</a></li>
                                        <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Kontak</a></li>
                                        <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Karir</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h3 class="text-sm font-semibold leading-6 text-white">Kontak Kami</h3>
                                    <ul role="list" class="mt-6 space-y-4">
                                        <li><p class="text-sm leading-6 text-gray-300">Jl. Kesehatan No. 123</p></li>
                                        <li><p class="text-sm leading-6 text-gray-300">Kota Hakim, 12345</p></li>
                                        <li><p class="text-sm leading-6 text-gray-300">(021) 123-4567</p></li>
                                        <li><p class="text-sm leading-6 text-gray-300">info@hakimhospital.com</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
                        <p class="text-xs leading-5 text-gray-400">&copy; {{ date('Y') }} Hakim Hospital. Semua Hak Dilindungi.</p>
                    </div>
                </div>
            </footer>
            <!-- ====== Akhir Footer ====== -->

        </div>
    </body>
</html>

