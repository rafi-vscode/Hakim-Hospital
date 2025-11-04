🏥 SISTEM MANAJEMEN RUMAH SAKIT HAKIM HOSPITAL

Aplikasi Web berbasis Laravel 12 untuk memenuhi persyaratan Proyek Tengah Semester mata kuliah Pemrograman Web II.

A. DESKRIPSI APLIKASI

Sistem ini dirancang untuk mengelola data inti operasional rumah sakit kecil, mencakup data pasien, layanan yang tersedia, dan pencatatan riwayat rekam medis (kunjungan/transaksi) yang menghubungkan pasien dengan layanan yang diterimanya.

Fitur Utama yang Tersedia:

CRUD Master Data: Pasien dan Layanan.

Relasi Data: Pencatatan Rekam Medis (Menghubungkan Pasien dan Layanan).

Autentikasi Kustom: Pendaftaran pengguna dengan detail tambahan (No. HP, Alamat, Jenis Kelamin).

Fitur Lanjutan: Search, Pagination, dan Upload File (Foto Pasien).

B. KEBUTUHAN SISTEM

Untuk menjalankan proyek ini, pastikan sistem Anda memenuhi persyaratan berikut:

Web Server: Apache / Nginx

PHP: Versi 8.3 atau lebih tinggi

Database: MySQL / MariaDB

Composer: Versi terbaru

Node.js & NPM: Versi terbaru (diperlukan untuk kompilasi Tailwind CSS)

C. CARA INSTALASI

Ikuti langkah-langkah berikut di terminal Anda:

1. Kloning Repositori

git clone <LINK_REPO_ANDA> sistem-rumahsakit
cd sistem-rumahsakit


2. Konfigurasi Awal

Salin file lingkungan dan buat App Key:

cp .env.example .env
php artisan key:generate


3. Instalasi Dependensi

Instal library PHP (Composer) dan library Frontend (NPM):

composer install
npm install


4. Konfigurasi Database

Atur kredensial database Anda di file .env (misalnya DB_DATABASE=sistem_rs, DB_USERNAME=root).

5. Migrasi Database

Jalankan migrasi untuk membuat semua tabel (users, pasiens, layanans, rekam_medis):

php artisan migrate:fresh


6. Kompilasi Aset

Kompilasi CSS (Tailwind) dan buat Symlink untuk fitur Upload File:

npm run dev
php artisan storage:link


7. Jalankan Aplikasi

php artisan serve


Aplikasi dapat diakses di http://127.0.0.1:8000.

D. AKUN DEMO

Peran

Username (Email)

Password

Keterangan

Admin

admin@hakim.com

password

Buat akun ini melalui halaman /register dan gunakan untuk demo fitur.

E. STRUKTUR UTAMA FOLDER (MVC)

Folder

Komponen

Entitas

Keterangan

app/Http/Controllers/

Controller

Pasien, Layanan, RekamMedis

Logika bisnis (CRUD, Search, dll.)

app/Models/

Model (Eloquent)

User, Pasien, Layanan, RekamMedis

Interaksi dengan database dan definisi relasi data.

database/migrations/

Migrations

All Tables

Skema database dan relasi antar tabel.

resources/views/

View (Blade)

pasien/*, layanan/*, rekam-medis/*

Tampilan (HTML) dan UI/UX aplikasi.

routes/

Routes

web.php

Definsi URL aplikasi (Route::resource).
