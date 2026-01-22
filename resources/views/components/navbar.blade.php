<nav class="fixed w-full z-50 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 shadow-xl border-b border-white/10">
    <!-- Menggunakan max-w-full dan px-4/6 agar logo lebih ke ujung kiri -->
    <div class="max-w-full mx-auto px-4 sm:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo - Sekarang lebih merapat ke kiri -->
            <a href="/" class="flex items-center gap-3 hover:scale-105 transition-transform duration-300 group">
                <div class="bg-white p-2 rounded-xl text-blue-900 shadow-lg group-hover:rotate-12 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v18M8 8h8" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl md:text-2xl font-black tracking-tighter text-white uppercase leading-none">Getsemani</span>
                    <span class="text-[10px] text-blue-200 font-bold tracking-[0.3em] uppercase opacity-80">Gereja Tuhan</span>
                </div>
            </a>

            <!-- Menu Desktop - Teks diperbesar, dikasih bayangan hitam (outline), dan disejajarkan tengah -->
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
                <!-- Header Baru: Daftar Jemaat -->
                <a href="/jemaat" class="text-lg hover:text-yellow-400 transition-colors relative group drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
                    Daftar Jemaat
                    <span class="absolute -bottom-1 left-0 w-0 h-1 bg-yellow-400 rounded-full transition-all group-hover:w-full"></span>
                </a>
                <a href="#kontak" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 px-6 py-2.5 rounded-full transition-all shadow-lg hover:shadow-yellow-500/50 flex items-center h-fit">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Toggle -->
            <div class="md:hidden flex items-center">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-white bg-white/10 rounded-lg">
                    <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu - Background Colorful -->
    <div id="mobile-menu" class="hidden md:hidden bg-indigo-950 text-white border-t border-white/10 p-6 space-y-4 shadow-2xl font-semibold">
        <a href="/" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Beranda</a>
        <a href="/sejarah" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Sejarah</a>
        <a href="/dokumentasi" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Dokumentasi</a>
        <a href="/jemaat" class="block py-2 text-lg hover:text-yellow-400 border-b border-white/5">Daftar Jemaat</a>
        <a href="#kontak" class="block py-2 text-lg text-yellow-400" onclick="document.getElementById('mobile-menu').classList.add('hidden')">Hubungi Kami</a>
    </div>
</nav>