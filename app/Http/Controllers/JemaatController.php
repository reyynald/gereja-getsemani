<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JemaatController extends Controller
{
    /**
     * Halaman Publik / Daftar Jemaat
     */
    public function index()
    {
        // 1. Ambil semua data jemaat
        $jemaats = Jemaat::all();

        // 2. Hitung statistik
        $total = $jemaats->count();
        
        // Logika statistik yang mendukung format 'Laki-laki/Perempuan' atau 'L/P'
        $pria = $jemaats->filter(function ($item) {
            return in_array($item->jenis_kelamin, ['Laki-laki', 'L']);
        })->count();

        $wanita = $jemaats->filter(function ($item) {
            return in_array($item->jenis_kelamin, ['Perempuan', 'P']);
        })->count();
        
        $totalRayon = $jemaats->unique('rayon')->count();

        return view('jemaat', compact('jemaats', 'total', 'pria', 'wanita', 'totalRayon'));
    }

    /**
     * Form Tambah Jemaat (Admin)
     */
    public function create()
    {
        return view('admin.jemaat.create');
    }

    /**
     * Proses Simpan Data Jemaat
     */
    public function store(Request $request)
    {
        // Validasi input termasuk field baru
        $validatedData = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'rayon'         => 'required|string',
            'alamat'        => 'required|string',
        ]);

        // Simpan ke database
        Jemaat::create($validatedData);

        return redirect()->route('admin.jemaat.index')
                         ->with('success', 'Data jemaat berhasil ditambahkan!');
    }

    /**
     * Form Edit Jemaat
     */
    public function edit($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        return view('admin.jemaat.edit', compact('jemaat'));
    }

    /**
     * Proses Update Data
     */
    public function update(Request $request, $id)
    {
        $jemaat = Jemaat::findOrFail($id);

        $validatedData = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'rayon'         => 'required|string',
            'alamat'        => 'required|string',
        ]);

        $jemaat->update($validatedData);

        return redirect()->route('admin.jemaat.index')
                         ->with('success', 'Data jemaat berhasil diperbarui!');
    }

    /**
     * Hapus Data Jemaat
     */
    public function destroy($id)
    {
        $jemaat = Jemaat::findOrFail($id);
        $jemaat->delete();

        return redirect()->route('admin.jemaat.index')
                         ->with('success', 'Data jemaat berhasil dihapus!');
    }
}