<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jemaat - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white hidden md:block shrink-0">
            <div class="p-6 text-2xl font-bold border-b border-slate-800 text-blue-400">
                GerejaApp
            </div>
            <nav class="mt-6 px-4">
                <a href="{{ route('admin.index') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fa-solid fa-gauge w-5 text-center"></i> Dashboard
                </a>
                <a href="{{ route('admin.jemaat.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-blue-600 text-white transition mt-2">
                    <i class="fa-solid fa-users w-5 text-center"></i> Data Jemaat
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <header class="bg-white border-b border-slate-200 p-4 flex justify-between items-center shadow-sm sticky top-0 z-10">
                <h2 class="text-xl font-semibold text-slate-800">Tambah Jemaat Baru</h2>
                <a href="{{ route('admin.jemaat.index') }}" class="text-slate-500 hover:text-slate-800 transition text-sm flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </header>

            <div class="p-8 max-w-3xl mx-auto">
                <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-lg font-bold text-slate-800">Formulir Data Jemaat</h3>
                        <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Informasi Identitas Jemaat</p>
                    </div>

                    <form action="{{ route('admin.jemaat.store') }}" method="POST" class="p-6 space-y-5">
                        @csrf

                        <!-- Input Nama -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required 
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                placeholder="Masukkan nama lengkap sesuai KTP...">
                            @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Row: Tempat & Tanggal Lahir -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required 
                                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    placeholder="Contoh: Manado">
                                @error('tempat_lahir') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Lahir</label>
                                <div class="relative">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required 
                                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                    <!-- Indikator Umur Melayang (Opsional agar admin tahu umurnya sudah terhitung) -->
                                    <span id="umur_badge" class="absolute right-10 top-1/2 -translate-y-1/2 bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-1 rounded hidden">
                                        0 Tahun
                                    </span>
                                </div>
                                @error('tanggal_lahir') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- INPUT HIDDEN: Umur dikirim secara rahasia ke backend -->
                        <input type="hidden" id="real_umur" name="umur" value="{{ old('umur') }}">

                        <!-- Row: Jenis Kelamin & Rayon -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-3">Jenis Kelamin</label>
                                <div class="flex gap-6 mt-1">
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required 
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                                        <span class="text-slate-600 group-hover:text-slate-900">Laki-laki</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} required 
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-slate-300">
                                        <span class="text-slate-600 group-hover:text-slate-900">Perempuan</span>
                                    </label>
                                </div>
                                @error('jenis_kelamin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Rayon / Sektor</label>
                                <select name="rayon" required 
                                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white">
                                    <option value="">-- Pilih Rayon --</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        @php $val = "Rayon ".str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                        <option value="{{ $val }}" {{ old('rayon') == $val ? 'selected' : '' }}>
                                            {{ $val }}
                                        </option>
                                    @endfor
                                </select>
                                @error('rayon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Status Jemaat -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status Jemaat</label>
                            <select name="status" required 
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white">
                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Pindah" {{ old('status') == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                <option value="Meninggal" {{ old('status') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                <option value="Pasif" {{ old('status') == 'Pasif' ? 'selected' : '' }}>Pasif (Tidak Aktif)</option>
                            </select>
                            @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="pt-6 flex flex-col md:flex-row gap-3">
                            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-lg shadow-blue-200 transition active:scale-[0.98] flex justify-center items-center">
                                <i class="fa-solid fa-save mr-2"></i> Simpan Data Jemaat
                            </button>
                            <a href="{{ route('admin.jemaat.index') }}" class="px-8 py-3 bg-slate-100 text-slate-600 hover:bg-slate-200 font-bold rounded-lg transition text-center">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
                <p class="text-center text-slate-400 text-xs mt-6">Sistem Informasi Manajemen Jemaat &copy; 2024</p>
            </div>
        </main>
    </div>

    <!-- Script Kalkulator Umur Otomatis -->
    <script>
        const tglLahirInput = document.getElementById('tanggal_lahir');
        const realUmur = document.getElementById('real_umur');
        const umurBadge = document.getElementById('umur_badge');

        function hitungUmur() {
            if (tglLahirInput.value) {
                const birthDate = new Date(tglLahirInput.value);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                const finalAge = age >= 0 ? age : 0;
                
                // Masukkan ke hidden input agar terkirim ke Laravel
                realUmur.value = finalAge;

                // Tampilkan badge umur kecil di samping input tanggal (sebagai feedback visual saja)
                umurBadge.innerText = finalAge + " Tahun";
                umurBadge.classList.remove('hidden');
            } else {
                umurBadge.classList.add('hidden');
            }
        }

        tglLahirInput.addEventListener('change', hitungUmur);
        
        // Jalankan saat load jika ada data lama (old value)
        window.onload = hitungUmur;
    </script>

</body>
</html>