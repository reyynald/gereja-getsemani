<x-layout>
    <x-slot:title>Sejarah - Gereja Getsemani</x-slot:title>

    <style>
        /* Animasi goyang untuk kartu utama di Desktop */
        @keyframes shadow-pulse {
            0% { box-shadow: 0 0 0 0 rgba(30, 64, 175, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(30, 64, 175, 0); }
            100% { box-shadow: 0 0 0 0 rgba(30, 64, 175, 0); }
        }

        /* Container Dasar - Disesuaikan untuk responsivitas */
        .card-stack-container {
            perspective: 2000px;
            height: 450px; /* Lebih pendek untuk mobile */
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            overflow: visible;
        }

        /* Responsive Mobile: Mengubah tumpukan menjadi scroll horizontal */
        @media (max-width: 768px) {
            .card-stack-container {
                display: flex;
                flex-direction: row;
                overflow-x: auto;
                justify-content: flex-start;
                padding: 20px 40px;
                gap: 20px;
                height: auto;
                perspective: none;
                scroll-snap-type: x mandatory;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none; /* Sembunyikan scrollbar */
            }
            .card-stack-container::-webkit-scrollbar { display: none; }

            .history-card {
                position: relative !important;
                flex: 0 0 280px;
                height: 400px !important;
                transform: none !important;
                opacity: 1 !important;
                scroll-snap-align: center;
                margin: 0 !important;
                border-width: 2px !important;
            }
            .pos-3 { animation: none !important; border-color: #1e40af !important; }
        }

        /* Desktop Mode: Efek Kipas */
        @media (min-width: 769px) {
            .history-card {
                position: absolute;
                width: 260px;
                height: 380px;
                border-radius: 1.5rem;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                border: 4px solid white;
                transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
                cursor: pointer;
                background: #f3f4f6;
                transform-origin: bottom center;
            }

            .pos-1 { transform: translate3d(-120px, 30px, -150px) rotate(-15deg); z-index: 10; opacity: 0.6; }
            .pos-2 { transform: translate3d(-60px, 15px, -70px) rotate(-8deg); z-index: 20; opacity: 0.9; }
            .pos-3 { 
                transform: translate3d(0, -20px, 100px) rotate(0deg) scale(1.05); 
                z-index: 50; 
                opacity: 1; 
                border-color: #1e40af;
                animation: shadow-pulse 2s infinite;
            }
            .pos-4 { transform: translate3d(60px, 15px, -70px) rotate(8deg); z-index: 20; opacity: 0.9; }
            .pos-5 { transform: translate3d(120px, 30px, -150px) rotate(15deg); z-index: 10; opacity: 0.6; }

            /* Hover Effect Desktop */
            .history-card:not(.pos-3):hover {
                transform: translate3d(var(--hover-x, 0), -40px, 250px) rotate(0deg) scale(1.1);
                z-index: 100;
                opacity: 1;
                border-color: #fbbf24;
                box-shadow: 0 30px 50px rgba(0,0,0,0.3);
            }

            .pos-1:hover { --hover-x: -140px; }
            .pos-2:hover { --hover-x: -80px; }
            .pos-4:hover { --hover-x: 80px; }
            .pos-5:hover { --hover-x: 140px; }
        }

        .swapping {
            pointer-events: none;
            opacity: 0.5;
            filter: blur(2px);
        }
    </style>

    <!-- Hero Sejarah -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-40 bg-slate-50 overflow-hidden">
        <div class="absolute top-0 right-0 w-full md:w-1/2 h-full bg-blue-100/30 -skew-x-12 translate-x-1/4 hidden md:block"></div>
        
        <div class="max-w-7xl mx-auto px-6 relative">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-16 items-center">
                
                <div class="reveal text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-full mb-6">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full animate-ping"></span>
                        EST. 1995
                    </div>
                    <h1 class="text-4xl md:text-7xl font-black text-blue-900 mb-6 leading-[1.1] tracking-tighter">
                        Jejak Kasih <br class="hidden md:block"> & Pelayanan
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-xl mx-auto lg:mx-0">
                        Dari persekutuan kecil hingga menjadi keluarga besar. Geser kartu untuk melihat momen bersejarah kami.
                    </p>
                    
                    <!-- Mobile Instruction -->
                    <div class="md:hidden flex items-center justify-center gap-2 text-blue-600 font-bold mb-4 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/><path d="M6 16L2 12L6 8"/></svg>
                        Geser Kartu
                    </div>
                </div>
                
                <!-- Card Container -->
                <div class="reveal delay-200 card-stack-container" id="cardStack">
                    @php
                        $items = [
                            ['year' => '1995', 'title' => 'Awal Doa', 'img' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622', 'pos' => 'pos-1'],
                            ['year' => '2005', 'title' => 'Visi Baru', 'img' => 'https://images.unsplash.com/photo-1543157145-f78c636d023d', 'pos' => 'pos-2'],
                            ['year' => '2012', 'title' => 'Gedung Pusat', 'img' => 'https://images.unsplash.com/photo-1544427920-c49ccfb85579', 'pos' => 'pos-3'],
                            ['year' => '2018', 'title' => 'Misi Global', 'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644', 'pos' => 'pos-4'],
                            ['year' => '2024', 'title' => 'Masa Depan', 'img' => 'https://images.unsplash.com/photo-1529070538774-1843cb3265df', 'pos' => 'pos-5'],
                        ];
                    @endphp

                    @foreach($items as $item)
                    <div class="history-card {{ $item['pos'] }}" onclick="swapToFront(this)">
                        <img src="{{ $item['img'] }}?auto=format&fit=crop&q=80&w=600" alt="{{ $item['year'] }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <span class="inline-block px-3 py-1 bg-yellow-500 text-blue-900 text-[10px] font-black rounded-full mb-2 uppercase">{{ $item['year'] }}</span>
                            <h4 class="text-xl font-bold leading-tight">{{ $item['title'] }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- Timeline Detail Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16 reveal">
                <h2 class="text-3xl md:text-5xl font-black text-blue-900 mb-4 tracking-tighter text-center">Detail Perjalanan</h2>
                <div class="h-1.5 w-16 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="space-y-12">
                <!-- Timeline Item -->
                <div class="flex flex-col md:flex-row gap-8 items-start reveal border-l-4 border-blue-100 pl-6 md:pl-0 md:border-0">
                    <div class="md:w-1/4 md:text-right">
                        <span class="text-5xl font-black text-blue-600/20 md:text-blue-600 block leading-none">1995</span>
                    </div>
                    <div class="md:w-3/4 bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:shadow-xl transition-shadow">
                        <h3 class="text-2xl font-bold mb-3 text-blue-900 uppercase tracking-tight">Persekutuan Kecil</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Dimulai dari kerinduan 5 kepala keluarga yang berkumpul di teras rumah Bapak Yohanes untuk berdoa bagi lingkungan sekitar Kota Berkat.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item -->
                <div class="flex flex-col md:flex-row gap-8 items-start reveal delay-100 border-l-4 border-blue-100 pl-6 md:pl-0 md:border-0">
                    <div class="md:w-1/4 md:text-right">
                        <span class="text-5xl font-black text-blue-600/20 md:text-blue-600 block leading-none">2012</span>
                    </div>
                    <div class="md:w-3/4 bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:shadow-xl transition-shadow">
                        <h3 class="text-2xl font-bold mb-3 text-blue-900 uppercase tracking-tight">Gedung Getsemani</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            Peresmian gedung utama yang mampu menampung 1.000 jemaat. Menjadi pusat pelayanan misi dan pelatihan bagi pemuda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function swapToFront(clickedCard) {
            // Cek jika desktop (punya class pos-x)
            if (window.innerWidth <= 768) return; 
            if (clickedCard.classList.contains('pos-3')) return;

            const mainCard = document.querySelector('.pos-3');
            const clickedPosClass = Array.from(clickedCard.classList).find(c => c.startsWith('pos-'));

            // Tambahkan visual feedback
            clickedCard.classList.add('swapping');
            mainCard.classList.add('swapping');

            setTimeout(() => {
                mainCard.classList.replace('pos-3', clickedPosClass);
                clickedCard.classList.replace(clickedPosClass, 'pos-3');

                clickedCard.classList.remove('swapping');
                mainCard.classList.remove('swapping');
            }, 300);
        }

        // Handle scroll behavior untuk mobile agar lebih mulus
        const stack = document.getElementById('cardStack');
        if (stack) {
            stack.addEventListener('scroll', () => {
                // Bisa ditambahkan logic jika ingin ada efek scale saat scroll di mobile
            });
        }
    </script>
</x-layout>