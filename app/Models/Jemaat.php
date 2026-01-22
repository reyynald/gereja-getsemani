<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    /**
     * Nama tabel: jemaats
     */
    protected $table = 'jemaats';

    /**
     * Properti $fillable menentukan kolom mana yang dapat diisi secara massal.
     * NIK, Telepon, dan Alamat telah dihapus.
     */
    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'rayon',
        'status',
    ];

    /**
     * Casting tipe data agar Laravel mengenali format tanggal dan angka secara otomatis.
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'umur' => 'integer',
    ];

    /**
     * Scope untuk mempermudah pengambilan data jemaat yang aktif saja.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }
}