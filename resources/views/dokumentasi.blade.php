<x-layout>
    <x-slot:title>Dokumentasi - Gereja Getsemani</x-slot:title>

    <!-- Header Galeri -->
    <section class="pt-28 md:pt-32 pb-8 md:pb-12 bg-gradient-to-b from-blue-50 to-white px-6">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-3xl md:text-6xl font-black text-blue-900 mb-4 tracking-tighter reveal">
                Galeri Foto Getsemani
            </h1>
            <p class="text-base md:text-xl text-gray-600 max-w-2xl mx-auto reveal delay-100 px-4">
                Melihat kembali kebaikan Tuhan melalui dokumentasi kegiatan dan kebersamaan seluruh jemaat.
            </p>
            <div class="h-1.5 w-16 md:w-20 bg-yellow-500 mx-auto mt-6 rounded-full reveal delay-200"></div>
        </div>
    </section>

    <!-- Slideshow Section -->
    <section id="slideshow-container" class="pb-16 md:pb-24 px-4 md:px-6 overflow-hidden">
        <div class="max-w-6xl mx-auto relative group">
            
            @php
                $photos = [
                    ['url' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622', 'title' => 'Ibadah Natal', 'tag' => 'Event'],
                    ['url' => 'https://images.unsplash.com/photo-1544427920-c49ccfb85579', 'title' => 'Retreat Pemuda', 'tag' => 'Youth'],
                    ['url' => 'https://images.unsplash.com/photo-1519491050282-ce00c72948b4', 'title' => 'Sekolah Minggu', 'tag' => 'Anak'],
                    ['url' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644', 'title' => 'Aksi Kasih', 'tag' => 'Sosial'],
                    ['url' => 'https://images.unsplash.com/photo-1515162305285-0293e4767cc2', 'title' => 'Paduan Suara', 'tag' => 'Pelayanan'],
                ];
            @endphp

            <!-- Slide Container: Aspect ratio disesuaikan untuk Mobile agar tidak terlalu pipih -->
            <div class="relative aspect-[4/3] md:aspect-[21/9] rounded-3xl md:rounded-[2.5rem] overflow-hidden shadow-2xl bg-gray-200">
                @foreach($photos as $index => $photo)
                <div class="photo-slide absolute inset-0 transition-all duration-1000 ease-in-out transform cursor-pointer {{ $index === 0 ? 'opacity-100 scale-100 translate-x-0 active-slide z-10' : 'opacity-0 scale-110 translate-x-10 z-0 pointer-events-none' }}" 
                     data-index="{{ $index }}"
                     onclick="openLightbox('{{ $photo['url'] }}')">
                    
                    <img src="{{ $photo['url'] }}?auto=format&fit=crop&q=80&w=1600" 
                         alt="{{ $photo['title'] }}" 
                         class="w-full h-full object-cover">

                    <!-- Overlay dengan padding responsif -->
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/20 to-transparent flex flex-col justify-end p-6 md:p-12 text-white">
                        <div class="transform translate-y-4 opacity-0 transition-all duration-700 delay-300 slide-info">
                            <span class="text-[10px] md:text-sm font-bold uppercase tracking-[0.2em] text-yellow-400 mb-1 md:mb-2 block">{{ $photo['tag'] }}</span>
                            <h2 class="text-2xl md:text-5xl font-black mb-1 leading-tight">{{ $photo['title'] }}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Navigasi Panah: Ukuran lebih kecil di mobile agar tidak menutupi konten -->
            <button onclick="changeSlide(-1)" class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 md:p-5 rounded-full text-white backdrop-blur-md transition-all z-20 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button onclick="changeSlide(1)" class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 md:p-5 rounded-full text-white backdrop-blur-md transition-all z-20 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>

            <!-- Indikator Dot: Lebih rapi -->
            <div class="flex justify-center gap-2 md:gap-3 mt-6">
                @foreach($photos as $index => $photo)
                <button onclick="goToSlide({{ $index }})" 
                        class="slide-dot h-1.5 md:h-2 w-6 md:w-8 rounded-full bg-blue-200 transition-all duration-300 z-20 {{ $index === 0 ? 'bg-blue-600 !w-10 md:!w-12' : '' }}">
                </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- LIGHTBOX MODAL RESPONSIVE -->
    <div id="lightbox" 
         class="fixed inset-0 z-[9999] bg-black/95 hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-2 md:p-10"
         onclick="closeLightbox()">
        
        <!-- Tombol Close: Ukuran pas untuk jempol di mobile -->
        <button class="fixed top-4 right-4 text-white/80 hover:text-white transition-all bg-white/10 p-3 rounded-full backdrop-blur-lg z-[10000]" 
                onclick="closeLightbox()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>

        <!-- Container Gambar: Maximize space on mobile -->
        <div class="relative w-full h-full flex items-center justify-center pointer-events-none p-2">
            <img id="lightbox-img" 
                 src="" 
                 class="max-w-full max-h-[85vh] md:max-h-full w-auto h-auto block object-contain transform scale-95 transition-transform duration-500 shadow-2xl pointer-events-auto rounded-lg md:rounded-none" 
                 onclick="event.stopPropagation()">
        </div>
    </div>

    <style>
        .active-slide .slide-info {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        
        /* Nav transition effect */
        .hide-navbar nav {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }

        body.overflow-hidden {
            overflow: hidden;
            padding-right: var(--scrollbar-width, 0px);
        }
    </style>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.photo-slide');
        const dots = document.querySelectorAll('.slide-dot');

        function setScrollbarWidth() {
            const width = window.innerWidth - document.documentElement.clientWidth;
            document.documentElement.style.setProperty('--scrollbar-width', width + 'px');
        }

        function updateSlides(newIndex) {
            if (!slides[currentIndex] || !slides[newIndex]) return;

            slides[currentIndex].classList.remove('opacity-100', 'scale-100', 'translate-x-0', 'active-slide', 'z-10');
            slides[currentIndex].classList.add('opacity-0', 'scale-110', 'translate-x-10', 'pointer-events-none', 'z-0');
            dots[currentIndex].classList.remove('bg-blue-600', '!w-10', 'md:!w-12');
            dots[currentIndex].classList.add('bg-blue-200', 'w-6', 'md:w-8');

            currentIndex = newIndex;
            
            slides[currentIndex].classList.remove('opacity-0', 'scale-110', 'translate-x-10', 'pointer-events-none', 'z-0');
            slides[currentIndex].classList.add('opacity-100', 'scale-100', 'translate-x-0', 'active-slide', 'z-10');
            dots[currentIndex].classList.remove('bg-blue-200', 'w-6', 'md:w-8');
            dots[currentIndex].classList.add('bg-blue-600', '!w-10', 'md:!w-12');
        }

        function changeSlide(direction) {
            let nextIndex = (currentIndex + direction + slides.length) % slides.length;
            updateSlides(nextIndex);
            resetInterval();
        }

        function goToSlide(index) {
            if (index === currentIndex) return;
            updateSlides(index);
            resetInterval();
        }

        function openLightbox(url) {
            setScrollbarWidth();
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');
            
            img.src = url;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            
            setTimeout(() => {
                document.body.classList.add('overflow-hidden');
                lightbox.classList.add('opacity-100');
                img.classList.remove('scale-95');
                img.classList.add('scale-100');
            }, 10);
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');

            lightbox.classList.remove('opacity-100');
            img.classList.remove('scale-100');
            img.classList.add('scale-95');

            setTimeout(() => {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }

        let slideInterval = setInterval(() => changeSlide(1), 6000);

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(() => changeSlide(1), 6000);
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
        });

        window.addEventListener('resize', setScrollbarWidth);
        
        // Swipe support sederhana untuk mobile
        let touchstartX = 0;
        let touchendX = 0;
        
        const sliderContainer = document.querySelector('.max-w-6xl.mx-auto.relative.group');
        sliderContainer.addEventListener('touchstart', e => {
            touchstartX = e.changedTouches[0].screenX;
        });

        sliderContainer.addEventListener('touchend', e => {
            touchendX = e.changedTouches[0].screenX;
            if (touchstartX - touchendX > 50) changeSlide(1);
            if (touchendX - touchstartX > 50) changeSlide(-1);
        });
    </script>
</x-layout>