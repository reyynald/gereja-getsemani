<x-layout>
    <x-slot:title>Beranda - Gereja Getsemani</x-slot:title>

    <!-- Hero Section -->
    <section class="relative h-[500px] md:h-[80vh] w-full overflow-hidden bg-black">
        <div class="h-full w-full relative">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?auto=format&fit=crop&q=80&w=2000" alt="Ibadah" class="object-cover w-full h-full opacity-60">
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-blue-900/60 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl reveal px-2">
                        <h1 class="text-3xl md:text-7xl font-bold text-white mb-4 md:mb-6 leading-tight">Selamat Datang di <br class="hidden md:block"> Gereja Getsemani</h1>
                        <p class="text-base md:text-2xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed">Berakar dalam Firman, Bertumbuh dalam Kasih, Berbuah bagi Sesama.</p>
                        <a href="#video-gallery" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 md:px-10 py-3.5 md:py-4 rounded-full font-bold transition-all transform hover:scale-105 shadow-lg active:scale-95 text-sm md:text-base">
                            Tonton Ibadah Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Gallery Grid Section -->
    <section id="video-gallery" class="py-16 md:py-24 px-4 md:px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 md:min-h-[150px] reveal">
                <h2 class="text-3xl md:text-5xl font-bold text-blue-900 mb-4 tracking-tight">Ibadah Online & Dokumentasi</h2>
                <p class="text-gray-500 max-w-2xl mx-auto px-4 text-sm md:text-base">Saksikan kembali momen ibadah dan pesan firman Tuhan kapan saja melalui galeri video kami.</p>
                <div class="h-1.5 w-20 md:w-24 bg-blue-600 mx-auto rounded-full mt-6"></div>
            </div>
            
            <!-- Grid Layout Video: Responsif 1 kolom (HP), 2 kolom (Tablet), 3 kolom (Desktop) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 mt-10">
                
                <!-- Card Video 1 -->
                <div class="reveal flex flex-col group">
                    <div class="mb-4 px-2">
                        <h3 class="text-lg md:text-xl font-bold text-blue-900 group-hover:text-blue-600 transition-colors">Ibadah Raya Minggu</h3>
                        <p class="text-xs md:text-sm text-gray-500">Ibadah Offline & Streaming</p>
                    </div>
                    <div class="relative aspect-video rounded-2xl md:rounded-[2rem] overflow-hidden shadow-lg border-2 md:border-4 border-white bg-gray-900 transition-all duration-500 group-hover:shadow-[0_20px_40px_rgba(30,64,175,0.2)] lg:group-hover:-translate-y-2">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/WIK79GXsheM" title="Ibadah 1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- Card Video 2 -->
                <div class="reveal delay-100 flex flex-col group lg:mt-12">
                    <div class="mb-4 px-2">
                        <h3 class="text-lg md:text-xl font-bold text-blue-900 group-hover:text-blue-600 transition-colors">Radiant Waylay Movement</h3>
                        <p class="text-xs md:text-sm text-gray-500">Youth & Young Adults</p>
                    </div>
                    <div class="relative aspect-video rounded-2xl md:rounded-[2.5rem] overflow-hidden shadow-lg border-2 md:border-4 border-white bg-gray-900 transition-all duration-500 group-hover:shadow-[0_20px_40px_rgba(30,64,175,0.2)] lg:group-hover:-translate-y-2">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/4MKKaGUB5OQ" title="Radiant #1 Waylay Movement" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- Card Video 3 -->
                <div class="reveal delay-200 flex flex-col group">
                    <div class="mb-4 px-2">
                        <h3 class="text-lg md:text-xl font-bold text-blue-900 group-hover:text-blue-600 transition-colors">Khotbah Mingguan</h3>
                        <p class="text-xs md:text-sm text-gray-500">Seri: Hidup Dalam Kelimpahan</p>
                    </div>
                    <div class="relative aspect-video rounded-2xl md:rounded-[2rem] overflow-hidden shadow-lg border-2 md:border-4 border-white bg-gray-900 transition-all duration-500 group-hover:shadow-[0_20px_40px_rgba(30,64,175,0.2)] lg:group-hover:-translate-y-2">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/a3UXwE4Fx50" title="Video Baru" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Jadwal Pelayanan -->
    <section id="jadwal" class="py-16 md:py-24 px-4 md:px-6 bg-blue-50">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-blue-900 mb-12 md:mb-16 reveal">Jadwal Pelayanan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-10">
                
                <!-- Card Jadwal 1 -->
                <div class="reveal bg-white p-8 md:p-10 rounded-3xl md:rounded-[2.5rem] shadow-sm border-b-4 md:border-b-8 border-blue-600 transition-all duration-500 hover:shadow-xl group lg:hover:-translate-y-4">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0 transition-transform group-hover:rotate-12">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Ibadah Minggu 1</h3>
                    <p class="text-blue-600 font-black text-lg md:text-xl mb-4">07:30 - 09:30 WIB</p>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed">Ibadah umum khidmat dengan puji-pujian tradisional yang memberkati.</p>
                </div>

                <!-- Card Jadwal 2 -->
                <div class="reveal delay-100 bg-white p-8 md:p-10 rounded-3xl md:rounded-[2.5rem] shadow-sm border-b-4 md:border-b-8 border-blue-600 transition-all duration-500 hover:shadow-xl group lg:hover:-translate-y-4">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0 transition-transform group-hover:rotate-12">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Ibadah Minggu 2</h3>
                    <p class="text-blue-600 font-black text-lg md:text-xl mb-4">10:30 - 12:30 WIB</p>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed">Ibadah keluarga yang hangat dan interaktif bersama Sekolah Minggu.</p>
                </div>

                <!-- Card Jadwal 3 -->
                <div class="reveal delay-200 bg-white p-8 md:p-10 rounded-3xl md:rounded-[2.5rem] shadow-sm border-b-4 md:border-b-8 border-blue-600 transition-all duration-500 hover:shadow-xl group lg:hover:-translate-y-4">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-blue-100 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto md:mx-0 transition-transform group-hover:rotate-12">
                        <svg class="w-6 h-6 md:w-8 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Ibadah Pemuda</h3>
                    <p class="text-blue-600 font-black text-lg md:text-xl mb-4">Sabtu, 18:00 WIB</p>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed">Wadah ekspresi dan pertumbuhan iman bagi generasi muda.</p>
                </div>

            </div>

            <!-- Pesan Ayat -->
            <div class="mt-16 md:mt-24 p-8 md:p-12 bg-white rounded-3xl md:rounded-[3.5rem] shadow-lg border border-blue-100 reveal">
                <p class="text-blue-900 text-lg md:text-xl font-medium italic leading-relaxed">
                    "Sebab di mana dua atau tiga orang berkumpul dalam Nama-Ku, di situ Aku ada di tengah-tengah mereka." 
                    <span class="not-italic font-bold mt-4 block text-blue-600 text-base md:text-lg">— Matius 18:20</span>
                </p>
            </div>
        </div>
    </section>
</x-layout>