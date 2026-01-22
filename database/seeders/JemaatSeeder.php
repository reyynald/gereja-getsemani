<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jemaat;
use Illuminate\Support\Facades\DB;

class JemaatSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     * Mengisi data contoh tanpa NIK, Telepon, dan Alamat.
     */
    public function run(): void
    {
        // Kosongkan tabel terlebih dahulu untuk menghindari duplikasi saat seeding ulang
        DB::table('jemaats')->truncate();

        $data = [
            [
                'nama_lengkap' => 'Budi Santoso',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1985-05-20',
                'umur' => 38,
                'jenis_kelamin' => 'L',
                'status' => 'Aktif',
                'rayon' => 'Rayon A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Maria Magdalena',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1992-12-10',
                'umur' => 31,
                'jenis_kelamin' => 'P',
                'status' => 'Aktif',
                'rayon' => 'Rayon B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Samuel Wijaya',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2000-01-15',
                'umur' => 24,
                'jenis_kelamin' => 'L',
                'status' => 'Aktif',
                'rayon' => 'Rayon A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Siti Aminah',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-08-25',
                'umur' => 28,
                'jenis_kelamin' => 'P',
                'status' => 'Tidak Aktif',
                'rayon' => 'Rayon C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Menggunakan Jemaat::insert untuk performa lebih cepat pada data banyak
        Jemaat::insert($data);
    }
}