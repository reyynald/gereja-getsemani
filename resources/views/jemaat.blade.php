<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jemaat - Gereja Getsemani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .glass-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(226, 232, 240, 0.8); }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-marquee { display: inline-block; animation: marquee 30s linear infinite; white-space: nowrap; }
    </style>
</head>
<body class="antialiased text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 shadow-xl border-b border-white/10">
        <div class="max-w-full mx-auto px-4 sm:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="/" class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 group">
                    <div class="bg-white p-2 rounded-xl text-blue-900 shadow-lg group-hover:rotate-12 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M8 8h8" /></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl md:text-2xl font-black tracking-tighter text-white uppercase leading-none">Getsemani</span>
                        <span class="text-[10px] text-blue-200 font-bold tracking-[0.3em] uppercase opacity-80">Gereja Tuhan</span>
                    </div>
                </a>
                <div class="hidden md:flex items-center space-x-10 font-bold text-white/90">
                    <a href="/" class="text-lg hover:text-yellow-400 transition-colors">Beranda</a>
                    <a href="{{ route('jemaat') }}" class="text-lg text-yellow-400 transition-colors">Daftar Jemaat</a>
                    <a href="#kontak" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 px-6 py-2.5 rounded-full transition-all shadow-lg">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-32 pb-20 px-6 md:px-10 max-w-7xl mx-auto w-full">
        <!-- Header -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h2 class="text-4xl font-black text-slate-900 tracking-tight">Database Jemaat</h2>
                <p class="text-slate-500 text-base mt-2">Menampilkan data jemaat yang terdaftar di database pusat.</p>
            </div>
            <a href="{{ route('login') }}" class="bg-blue-900 hover:bg-indigo-800 text-white px-8 py-4 rounded-2xl text-sm font-bold transition-all shadow-xl flex items-center gap-3 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Kelola Data (Login)
            </a>
        </div>
        
        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
            <div class="glass-card p-6 rounded-[2rem] border-t-4 border-blue-600">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Jemaat</p>
                <h3 class="text-3xl font-black text-slate-800">{{ number_format($total ?? 0) }}</h3>
            </div>
            <div class="glass-card p-6 rounded-[2rem] border-t-4 border-emerald-500">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Pria</p>
                <h3 class="text-3xl font-black text-slate-800">{{ number_format($pria ?? 0) }}</h3>
            </div>
            <div class="glass-card p-6 rounded-[2rem] border-t-4 border-rose-500">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Wanita</p>
                <h3 class="text-3xl font-black text-slate-800">{{ number_format($wanita ?? 0) }}</h3>
            </div>
            <div class="glass-card p-6 rounded-[2rem] border-t-4 border-yellow-500">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Wilayah/Rayon</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $totalRayon ?? 0 }}</h3>
            </div>
        </div>

        <!-- Table Card -->
        <div class="glass-card rounded-[2.5rem] shadow-2xl overflow-hidden border border-white">
            <div class="p-8 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative max-w-md w-full">
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari berdasarkan nama..." class="w-full pl-12 pr-6 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                    <div class="absolute left-4 top-3 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left" id="jemaatTable">
                    <thead>
                        <tr class="bg-slate-50/80 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                            <th class="px-8 py-6 text-center">No</th>
                            <th class="px-6 py-6">Informasi Jemaat</th>
                            <th class="px-6 py-6 text-center">JK</th>
                            <th class="px-6 py-6 text-center">Rayon</th>
                            <th class="px-6 py-6 text-center">Status</th>
                            <th class="px-8 py-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($jemaats as $index => $item)
                        <tr class="group hover:bg-blue-50/40 transition-all">
                            <td class="px-8 py-6 text-sm font-bold text-slate-300 text-center">{{ $index + 1 }}</td>
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="h-11 w-11 rounded-2xl bg-gradient-to-br {{ $item->jenis_kelamin == 'L' ? 'from-blue-700 to-indigo-900' : 'from-rose-500 to-pink-600' }} flex items-center justify-center text-white font-black text-sm shadow-lg">
                                        {{ substr($item->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-black text-slate-800 tracking-tight">{{ strtoupper($item->nama_lengkap) }}</div>
                                        <div class="text-[11px] text-slate-400 font-bold mt-0.5">NIK: {{ $item->nik ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center font-bold {{ $item->jenis_kelamin == 'L' ? 'text-blue-600' : 'text-rose-500' }}">{{ $item->jenis_kelamin }}</td>
                            <td class="px-6 py-6 text-center"><span class="text-[10px] font-black text-blue-900 bg-blue-50 px-3 py-1.5 rounded-xl border border-blue-100">RAYON {{ $item->rayon ?? '-' }}</span></td>
                            <td class="px-6 py-6 text-center"><span class="text-[9px] font-black uppercase px-3 py-1.5 rounded-full border border-emerald-100 bg-emerald-50 text-emerald-500">AKTIF</span></td>
                            <td class="px-8 py-6 text-right">
                                <button class="p-2 bg-white border border-slate-200 rounded-lg hover:bg-blue-900 hover:text-white transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center opacity-40">
                                <p class="text-lg font-bold">Data Belum Tersedia</p>
                                <p class="text-sm italic">Silakan isi data melalui panel admin.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer id="kontak" class="bg-blue-900 text-white mt-auto overflow-hidden">
        <div class="bg-yellow-500 text-blue-900 py-3 relative overflow-hidden border-y border-yellow-600">
            <div class="animate-marquee font-black uppercase tracking-widest text-sm">
                &copy; {{ date('Y') }} Gereja Getsemani. Berakar dalam Firman, Bertumbuh dalam Kasih, Berbuah bagi Sesama • Ibadah Raya Minggu Pukul 09:00 WIB • Tuhan Yesus Memberkati • 
            </div>
        </div>
    </footer>

    <script>
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const table = document.getElementById("jemaatTable");
            const tr = table.getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                if(tr[i].innerText.includes("Data Belum Tersedia")) continue;
                const tdText = tr[i].textContent || tr[i].innerText;
                tr[i].style.display = tdText.toUpperCase().indexOf(filter) > -1 ? "" : "none";
            }
        }
    </script>
</body>
</html>