<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin agar bisa LOGIN
        User::create([
            'name' => 'Admin Getsemani',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Panggil Seeder Jemaat yang kita buat tadi
        $this->call([
            JemaatSeeder::class,
        ]);
    }
}