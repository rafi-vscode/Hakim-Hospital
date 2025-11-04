<?php
// Ini adalah file add_custom_fields_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp', 15)->nullable()->after('email');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('no_hp');
            $table->text('alamat')->nullable()->after('jenis_kelamin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Urutan penghapusan harus sesuai urutan penambahan
            $table->dropColumn('alamat');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('no_hp');
        });
    }
};