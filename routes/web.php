<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE HALAMAN DEPAN (GUEST) ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/jemaat', function () {
    $jemaats = Jemaat::all();
    return view('jemaat.index', compact('jemaats'));
})->name('jemaat.public');

// Menambahkan rute Sejarah
Route::get('/sejarah', function () {
    return view('sejarah'); // Pastikan Anda memiliki file resources/views/sejarah.blade.php
})->name('sejarah');

// Menambahkan rute Dokumentasi
Route::get('/dokumentasi', function () {
    return view('dokumentasi'); // Pastikan Anda memiliki file resources/views/dokumentasi.blade.php
})->name('dokumentasi');


// --- RUTE AUTENTIKASI ---
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors(['email' => 'Login gagal, periksa email/password.']);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


// --- RUTE ADMIN (PERLU LOGIN) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin 
    Route::get('/dashboard', function () {
        $jemaats = Jemaat::all();
        return view('admin.jemaat.index', compact('jemaats'));
    })->name('index'); 

    // CRUD JEMAAT
    Route::get('/jemaat', function () {
        $jemaats = Jemaat::all();
        return view('admin.jemaat.index', compact('jemaats'));
    })->name('jemaat.index');

    Route::get('/jemaat/create', function () {
        return view('admin.jemaat.create');
    })->name('jemaat.create');

    // Store Jemaat
    Route::post('/jemaat', function (Request $request) {
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'umur'          => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:L,P',
            'rayon'         => 'required|string',
            'status'        => 'required|string'
        ]);

        Jemaat::create($validated);
        return redirect()->route('admin.jemaat.index')->with('success', 'Data jemaat berhasil disimpan.');
    })->name('jemaat.store');

    Route::get('/jemaat/{id}/edit', function ($id) {
        $jemaat = Jemaat::findOrFail($id);
        return view('admin.jemaat.edit', compact('jemaat'));
    })->name('jemaat.edit');

    // Update Jemaat
    Route::put('/jemaat/{id}', function (Request $request, $id) {
        $jemaat = Jemaat::findOrFail($id);
        
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'umur'          => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:L,P',
            'rayon'         => 'required|string',
            'status'        => 'required|string'
        ]);

        $jemaat->update($validated);
        return redirect()->route('admin.jemaat.index')->with('success', 'Data jemaat diperbarui.');
    })->name('jemaat.update');

    Route::delete('/jemaat/{id}', function ($id) {
        Jemaat::destroy($id);
        return redirect()->route('admin.jemaat.index')->with('success', 'Data berhasil dihapus.');
    })->name('jemaat.destroy');
});