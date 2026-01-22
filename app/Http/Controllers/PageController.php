<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() { return view('welcome'); }
    public function sejarah() { return view('sejarah'); }
    public function dokumentasi() { return view('dokumentasi'); }

    /**
     * Menampilkan halaman Daftar Jemaat
     */
    public function jemaat()
    {
        // Simulasi 1000 data jemaat
        $names = ['Budi', 'Siti', 'Agus', 'Lusi', 'Andi', 'Dewi', 'Joko', 'Maria', 'Anton', 'Rina'];
        $jemaat = [];

        for ($i = 1; $i <= 1000; $i++) {
            $gender = $i % 2 == 0 ? 'Pria' : 'Wanita';
            $jemaat[] = [
                'id' => $i,
                'nama' => $names[array_rand($names)] . ' ' . $i,
                'umur' => rand(5, 80),
                'jenis_kelamin' => $gender,
                'rayon' => rand(1, 4)
            ];
        }

        return view('jemaat', compact('jemaat'));
    }
}