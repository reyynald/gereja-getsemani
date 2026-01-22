<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel jemaats.
     */
    public function up(): void
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('umur'); // Kolom umur ditambahkan
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('status'); // Aktif / Tidak Aktif
            $table->string('rayon'); // Rayon A, B, dsb
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaats');
    }
};