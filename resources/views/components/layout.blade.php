<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Gereja Getsemani' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* --- ANIMASI EKSISTING --- */

        @keyframes drift-slow {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-20px) translateX(5px) rotate(1deg); }
            66% { transform: translateY(-10px) translateX(-5px) rotate(-0.5deg); }
        }

        .reveal {
            opacity: 0;
            filter: blur(8px);
            transform: translateY(40px);
            transition: 
                opacity 1.2s cubic-bezier(0.22, 1, 0.36, 1),
                transform 1.2s cubic-bezier(0.22, 1, 0.36, 1),
                filter 1.2s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform, opacity, filter;
        }

        .reveal.active {
            opacity: 1;
            filter: blur(0);
            transform: translateY(0);
        }

        .reveal-left { transform: translateX(-50px); opacity: 0; filter: blur(10px); }
        .reveal-right { transform: translateX(50px); opacity: 0; filter: blur(10px); }
        .reveal-left.active, .reveal-right.active { transform: translateX(0); opacity: 1; filter: blur(0); }

        .cloud-sidebar {
            filter: drop-shadow(0 10px 20px rgba(125, 211, 252, 0.15));
            animation: drift-slow 15s ease-in-out infinite;
            will-change: transform;
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .page-fade {
            animation: fadeInPage 1.5s cubic-bezier(0.39, 0.575, 0.565, 1) forwards;
        }

        @keyframes fadeInPage {
            from { opacity: 0; transform: scale(1.02); }
            to { opacity: 1; transform: scale(1); }
        }

        /* --- ANIMASI TOMBOL & RIPPLE --- */
        .btn-animate {
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            cursor: pointer;
        }

        .btn-animate:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px -10px rgba(14, 165, 233, 0.5);
        }

        .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple-effect 0.8s ease-out;
            pointer-events: none;
        }

        @keyframes ripple-effect {
            to { transform: scale(4); opacity: 0; }
        }
        
        /* Smooth Scroll Behavior pada level HTML */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-slate-50 text-gray-900 overflow-x-hidden flex flex-col min-h-screen relative selection:bg-sky-200">
    
    <!-- Dekorasi Awan (Kiri & Kanan) -->
    <div id="cloud-left" class="fixed left-0 top-0 bottom-0 w-24 md:w-36 pointer-events-none z-40 hidden lg:block">
        <svg class="h-full w-full cloud-sidebar" preserveAspectRatio="none" viewBox="0 0 120 1000" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="cloudGradLeft" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#f8fafc;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#e0f2fe;stop-opacity:1" />
                </linearGradient>
            </defs>
            <path d="M110 0 C 95 60, 45 110, 75 170 C 105 230, 35 290, 65 350 C 95 410, 25 470, 55 530 C 85 590, 35 650, 65 710 C 95 770, 25 830, 55 890 C 85 950, 55 1000, 0 1000 L 0 0 Z" fill="#bae6fd" opacity="0.15" />
            <path d="M100 0 C 85 60, 35 110, 55 160 C 75 210, 25 260, 45 310 C 65 360, 15 410, 35 460 C 55 510, 25 560, 45 610 C 65 660, 15 710, 35 760 C 55 810, 25 860, 45 910 C 65 960, 35 1000, 0 1000 L 0 0 Z" fill="url(#cloudGradLeft)" />
        </svg>
    </div>

    <div id="cloud-right" class="fixed right-0 top-0 bottom-0 w-24 md:w-36 pointer-events-none z-40 hidden lg:block">
        <svg class="h-full w-full cloud-sidebar" style="animation-delay: -7s;" preserveAspectRatio="none" viewBox="0 0 120 1000" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="cloudGradRight" x1="100%" y1="0%" x2="0%" y2="0%">
                    <stop offset="0%" style="stop-color:#f8fafc;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#e0f2fe;stop-opacity:1" />
                </linearGradient>
            </defs>
            <path d="M10 0 C 25 60, 75 110, 45 170 C 15 230, 85 290, 55 350 C 25 410, 95 470, 65 530 C 35 590, 85 650, 55 710 C 25 770, 95 830, 65 890 C 35 950, 65 1000, 120 1000 L 120 0 Z" fill="#bae6fd" opacity="0.15" />
            <path d="M20 0 C 35 60, 85 110, 65 160 C 45 210, 95 260, 75 310 C 55 360, 105 410, 85 460 C 65 510, 95 560, 75 610 C 55 660, 105 710, 85 760 C 65 810, 95 860, 75 910 C 55 960, 85 1000, 120 1000 L 120 0 Z" fill="url(#cloudGradRight)" />
        </svg>
    </div>

    <x-navbar />

    <main class="page-fade flex-grow relative z-10">
        {{ $slot }}
    </main>

    <!-- Pastikan footer memiliki id="main-footer" atau gunakan selector yang sesuai -->
    <footer id="main-footer">
        <x-footer />
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Reveal Elements (On Scroll)
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('active');
                        }, 100);
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

            // 2. Parallax Awan
            const cloudLeft = document.getElementById('cloud-left');
            const cloudRight = document.getElementById('cloud-right');
            const updateParallax = () => {
                const scrolled = window.pageYOffset;
                if (cloudLeft && cloudRight) {
                    cloudLeft.style.transform = `translate3d(0, ${scrolled * 0.03}px, 0)`;
                    cloudRight.style.transform = `translate3d(0, ${-scrolled * 0.03}px, 0)`;
                }
                requestAnimationFrame(updateParallax);
            };
            requestAnimationFrame(updateParallax);

            // 3. LOGIKA BUTTON: RIPPLE + SMOOTH SCROLL KE FOOTER
            document.addEventListener('click', (e) => {
                // Cari apakah yang diklik adalah tombol Hubungi Kami
                const btn = e.target.closest('.btn-hubungi');
                
                if (btn) {
                    // --- A. Efek Ripple ---
                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    const rect = btn.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = `${size}px`;
                    ripple.style.left = `${e.clientX - rect.left - size/2}px`;
                    ripple.style.top = `${e.clientY - rect.top - size/2}px`;
                    btn.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 800);

                    // --- B. Smooth Scroll ke Footer ---
                    const footer = document.getElementById('main-footer');
                    if (footer) {
                        footer.scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>