<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jemaat - Gereja Getsemani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: inline-block;
            animation: marquee 30s linear infinite;
        }
        .reveal { opacity: 1; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

    <!-- NAVBAR (Tetap Sesuai Permintaan) -->
    <nav class="fixed w-full z-50 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 shadow-xl border-b border-white/10">
        <div class="max-w-full mx-auto px-4 sm:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 group">
                    <div class="bg-white p-2 rounded-xl text-blue-900 shadow-lg group-hover:rotate-12 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M8 8h8" /></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl md:text-2xl font-black tracking-tighter text-white uppercase leading-none">Getsemani</span>
                        <span class="text-[10px] text-blue-200 font-bold tracking-[0.3em] uppercase opacity-80">Gereja Tuhan</span>
                    </div>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-10 font-bold text-white/90">
                    <a href="/" class="text-lg hover:text-yellow-400 transition-colors relative group drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-1 bg-yellow-400 rounded-full transition-all group-hover:w-full"></span>
                    </a>
                    <a href="/sejarah" class="text-lg hover:text-yellow-400 transition-colors relative group drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
                        Sejarah
                        <span class="absolute -bottom-1 left-0 w-0 h-1 bg-yellow-400 rounded-full transition-all group-hover:w-full"></span>
                    </a>
                    <a href="/dokumentasi" class="text-lg hover:text-yellow-400 transition-colors relative group drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
                        Dokumentasi
                        <span class="absolute -bottom-1 left-0 w-0 h-1 bg-yellow-400 rounded-full transition-all group-hover:w-full"></span>
                    </a>
                    <a href="/jemaat" class="text-lg text-yellow-400 relative group drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
                        Daftar Jemaat
                        <span class="absolute -bottom-1 left-0 w-full h-1 bg-yellow-400 rounded-full"></span>
                    </a>
                    <a href="#kontak" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 px-6 py-2.5 rounded-full transition-all shadow-lg hover:shadow-yellow-500/50 flex items-center h-fit">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <div class="md:hidden flex items-center">
                    <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-white bg-white/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="6" y2="6" /><line x1="4" x2="20" y1="12" y2="12" /><line x1="4" x2="20" y1="18" y2="18" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-indigo-950 text-white border-t border-white/10 p-6 space-y-4 shadow-2xl font-semibold">
            <a href="/" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Beranda</a>
            <a href="/sejarah" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Sejarah</a>
            <a href="/dokumentasi" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Dokumentasi</a>
            <a href="/jemaat" class="block py-2 text-lg text-yellow-400 border-b border-white/5">Daftar Jemaat</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow pt-32 pb-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="mb-10 text-center">
                <h2 class="text-blue-900 font-black text-4xl md:text-5xl uppercase tracking-tighter mb-4">Daftar Jemaat</h2>
                <div class="w-24 h-2 bg-yellow-500 mx-auto rounded-full"></div>
            </div>

            <!-- Search Bar -->
            <div class="mb-8 max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama atau rayon..." class="w-full pl-12 pr-6 py-4 bg-white border border-slate-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                    <div class="absolute left-4 top-4 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-200">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse" id="jemaatTable">
                        <thead class="bg-blue-900 text-white uppercase text-[11px] tracking-[0.2em]">
                            <tr>
                                <th class="px-8 py-6 font-bold text-center">No</th>
                                <th class="px-6 py-6 font-bold">Nama Lengkap Jemaat</th>
                                <th class="px-6 py-6 font-bold text-center">Jenis Kelamin</th>
                                <th class="px-6 py-6 font-bold text-center">Umur</th>
                                <th class="px-6 py-6 font-bold text-center">Rayon</th>
                                <th class="px-6 py-6 font-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($jemaats as $index => $item)
                            <tr class="hover:bg-blue-50/50 transition-all group">
                                <td class="px-8 py-6 text-sm font-bold text-slate-300 text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 shrink-0 rounded-xl bg-gradient-to-br {{ $item->jenis_kelamin == 'L' ? 'from-blue-600 to-indigo-800' : 'from-rose-500 to-pink-600' }} flex items-center justify-center text-white font-black text-sm shadow-md">
                                            {{ substr($item->nama_lengkap, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-slate-800 tracking-tight">{{ strtoupper($item->nama_lengkap) }}</div>
                                            <div class="text-[10px] text-slate-400 font-bold mt-0.5 italic">TTL: {{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d M Y') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="text-[10px] font-bold px-3 py-1.5 rounded-lg {{ $item->jenis_kelamin == 'L' ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-rose-500 bg-rose-50 border border-rose-100' }}">
                                        {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-center font-bold text-slate-600 text-xs">
                                    {{ $item->umur }} Thn
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="text-[10px] font-black text-indigo-900 bg-indigo-50 px-4 py-1.5 rounded-xl border border-indigo-100 italic">
                                        {{ strtoupper($item->rayon) }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="text-[9px] font-black uppercase px-3 py-1.5 rounded-full border {{ $item->status == 'Aktif' ? 'bg-emerald-50 text-emerald-500 border-emerald-100' : 'bg-slate-50 text-slate-400 border-slate-100' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-10 text-center text-slate-400 italic">Belum ada data jemaat yang terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER (Tetap Sesuai Permintaan) -->
    <footer id="kontak" class="bg-blue-900 text-white pt-20 overflow-hidden mt-auto">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 border-b border-blue-800 pb-16">
            <!-- Brand & Alamat -->
            <div class="reveal">
                <div class="flex items-center gap-2 mb-6">
                    <div class="bg-white p-2 rounded-lg text-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M8 8h8"/></svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tighter uppercase">Gereja Getsemani</span>
                </div>
                <p class="text-blue-100 leading-relaxed opacity-80">
                    Jl. Kasih Karunia No. 123, <br>
                    Kota Sejahtera, Indonesia. <br>
                    <span class="block mt-4">Email: info@gerejagetsemani.com</span>
                    <span>Telp: +62 812 3456 7890</span>
                </p>
            </div>

            <!-- Quick Links -->
            <div class="reveal delay-100">
                <h3 class="text-xl font-bold mb-6">Navigasi</h3>
                <ul class="space-y-4 opacity-80">
                    <li><a href="/" class="hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="/sejarah" class="hover:text-yellow-400 transition">Sejarah</a></li>
                    <li><a href="/dokumentasi" class="hover:text-yellow-400 transition">Dokumentasi</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="reveal delay-200">
                <h3 class="text-xl font-bold mb-6">Media Sosial</h3>
                <div class="flex gap-4">
                    <a href="https://instagram.com" target="_blank" class="bg-blue-800 p-4 rounded-2xl hover:bg-yellow-500 hover:text-blue-900 transition-all transform hover:-translate-y-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="bg-blue-800 p-4 rounded-2xl hover:bg-yellow-500 hover:text-blue-900 transition-all transform hover:-translate-y-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 2-2 58.38 58.38 0 0 1 15 0 2 2 0 0 1 2 2 24.12 24.12 0 0 1 0 10 2 2 0 0 1-2 2 58.38 58.38 0 0 1-15 0 2 2 0 0 1-2-2z"/><polygon points="9.75 15.02 15.5 12.01 9.75 9"/></svg>
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="bg-blue-800 p-4 rounded-2xl hover:bg-yellow-500 hover:text-blue-900 transition-all transform hover:-translate-y-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-11.7 8.38 8.38 0 0 1 3.8.9L21 3z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Banner Iklan Berjalan (Running Text) -->
        <div class="bg-yellow-500 text-blue-900 py-3 relative overflow-hidden whitespace-nowrap border-y border-yellow-600">
            <div class="animate-marquee inline-block font-black uppercase tracking-widest text-sm md:text-base">
                &copy; {{ date('Y') }} Gereja Getsemani. All Rights Reserved. • Berakar dalam Firman, Bertumbuh dalam Kasih, Berbuah bagi Sesama • Mari Bergabung dalam Ibadah Raya Setiap Minggu Pukul 09:00 WIB • Tuhan Yesus Memberkati • 
                &copy; {{ date('Y') }} Gereja Getsemani. All Rights Reserved. • Berakar dalam Firman, Bertumbuh dalam Kasih, Berbuah bagi Sesama • Mari Bergabung dalam Ibadah Raya Setiap Minggu Pukul 09:00 WIB • Tuhan Yesus Memberkati • 
            </div>
        </div>

        <div class="text-center py-6 opacity-40 text-[10px] uppercase tracking-[0.3em]">
            Soli Deo Gloria 
        </div>
    </footer>

    <script>
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const table = document.getElementById("jemaatTable");
            const tr = table.getElementsByTagName("tr");
            
            for (let i = 1; i < tr.length; i++) {
                const tdText = tr[i].textContent || tr[i].innerText;
                if (tdText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>