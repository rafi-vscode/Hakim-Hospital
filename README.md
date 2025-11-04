🏥 SISTEM MANAJEMEN RUMAH SAKIT HAKIM HOSPITAL

<p align="center">
<a href="https://laravel.com" target="_blank"><img src="https://www.google.com/search?q=https://raw.githubusercontent.com/laravel/art/master/logo-lockup.svg" width="100" alt="Laravel Logo"></a>





<img src="https://www.google.com/search?q=https://img.shields.io/badge/PHP-8.3%2B-8892BF.svg%3Fstyle%3Dflat-square" alt="PHP Version">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Laravel-12-FF2D20.svg%3Fstyle%3Dflat-square" alt="Laravel Version">
<img src="https://www.google.com/search?q=https://img.shields.io/badge/Status-Complete-22c55e.svg%3Fstyle%3Dflat-square" alt="Project Status">
</p>

Aplikasi Web berbasis Laravel 12 yang dikembangkan sebagai Proyek Tengah Semester mata kuliah Pemrograman Web II.

🚀 FITUR UTAMA APLIKASI

Sistem ini dirancang untuk mengelola data inti operasional rumah sakit dengan fokus pada integritas data dan alur kerja admin:

CRUD Lengkap (3 Entitas): Manajemen Pasien, Layanan, dan Rekam Medis.

Relasi Data: Integrasi Rekam Medis (Many-to-Many) yang menghubungkan Pasien dengan Layanan.

Autentikasi Kustom: Form Register dilengkapi dengan field tambahan (No. HP, Jenis Kelamin, Alamat).

Fitur Canggih: Pagination, Search Filter, dan Upload File (Foto Profil Pasien).

Desain Responsif: Menggunakan Tailwind CSS.

⚙️ KEBUTUHAN SISTEM

Proyek ini membutuhkan lingkungan pengembangan standar PHP.

Komponen

Versi Minimal

PHP

8.3

Laravel Framework

12

Database

MySQL / MariaDB

Web Server

Apache / Nginx

Tools

Composer, Node.js & NPM

📦 PANDUAN INSTALASI

Ikuti langkah-langkah berikut di terminal Anda untuk menyiapkan proyek.

1. Kloning Repositori

git clone <LINK_REPO_ANDA> sistem-rumahsakit
cd sistem-rumahsakit


2. Instalasi Dependensi & Konfigurasi

# Salin Environment file & Buat App Key
cp .env.example .env
php artisan key:generate

# Instal library PHP dan Frontend
composer install
npm install


3. Migrasi Database

Pastikan kredensial database di .env sudah benar, lalu jalankan migrasi database:

# Hapus tabel lama dan buat tabel baru (users, pasiens, layanans, rekam_medis)
php artisan migrate:fresh


4. Kompilasi Aset & Storage

Kompilasi aset CSS/JS dan buat Symlink untuk fitur Upload File:

npm run dev
php artisan storage:link


5. Jalankan Aplikasi

Aplikasi akan berjalan di http://127.0.0.1:8000.

php artisan serve


🔑 AKSES & UJI COBA

A. AKUN DEMO

Untuk menguji fitur admin (CRUD), silakan buat akun dengan detail berikut di halaman /register:

Peran

Username (Email)

Password

Keterangan

Admin

admin@hakim.com

password

Akses penuh Dashboard dan semua modul manajemen.

B. STRUKTUR APLIKASI (MVC)

Folder

Komponen

Entitas Utama

Keterangan

app/Http/Controllers/

Controller

Pasien, Layanan, RekamMedis

Logika bisnis (CRUD, Upload File, Search).

app/Models/

Model (Eloquent)

Pasien, Layanan, RekamMedis

Definisi relasi (One-to-Many) dan interaksi DB.

resources/views/

View (Blade)

pasien/*, layanan/*, rekam-medis/*

Tampilan front-end dan form input.

database/migrations/

Migrations

users, pasiens, rekam_medis

Skema tabel database.
