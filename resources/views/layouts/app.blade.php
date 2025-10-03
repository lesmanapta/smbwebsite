<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MMB Travel - Umrah & Haji Terpercaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Anda bisa menambahkan custom style di sini jika perlu */
        .prose { max-width: 65ch; }
    </style>
    ...
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    ...
    {{-- Pastikan ini ada jika Anda menggunakan @stack('styles') --}}
    @stack('styles') 
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto max-w-6xl p-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-sky-700">MMB Travel</a>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-sky-700 px-3">Beranda</a>
                <a href="{{ route('packages.index') }}" class="text-gray-600 hover:text-sky-700 px-3">Paket Umroh</a>
                <a href="#" class="text-gray-600 hover:text-sky-700 px-3">Haji Khusus</a>
                <a href="{{ route('consultation.index') }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Konsultasi Gratis</a>
            </div>
            <div class="md:hidden">
                <button id="hamburger-button" class="text-gray-600 hover:text-sky-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <a href="{{ url('/') }}" class="block text-gray-600 hover:bg-gray-100 py-2 px-4">Beranda</a>
            <a href="{{ route('packages.index') }}" class="block text-gray-600 hover:bg-gray-100 py-2 px-4">Paket Umroh</a>
            <a href="#" class="block text-gray-600 hover:bg-gray-100 py-2 px-4">Haji Khusus</a>
            <a href="{{ route('consultation.index') }}" class="block bg-sky-500 text-white text-center font-bold m-2 py-2 px-4 rounded-lg">Konsultasi Gratis</a>
        </div>
    </header>

    <main>
        {{-- Ini adalah "slot" di mana konten unik setiap halaman akan dimasukkan --}}
        @yield('content')
    </main>
    
    <footer class="bg-sky-950 text-white pt-12 pb-8">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-sky-300">Sosial Media</h3>
                    <p class="text-gray-300 mb-4 text-sm">Jangan lewatkan informasi lainnya di sosial media kami.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-sky-500 p-2 rounded-md hover:bg-sky-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.732 0 1.325-.593 1.325-1.325V1.325C24 .593 23.407 0 22.675 0z"></path></svg>
                        </a>
                        <a href="#" class="bg-sky-500 p-2 rounded-md hover:bg-sky-600 transition-colors">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.85s.012-3.584.07-4.85c.149-3.227 1.664-4.771 4.919 4.919 1.266-.057 1.645-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.947s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"></path></svg>
                        </a>
                         <a href="#" class="bg-sky-500 p-2 rounded-md hover:bg-sky-600 transition-colors">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M21.582 6.186A2.693 2.693 0 0 0 19.7 4.304a25.32 25.32 0 0 0-7.7-1.304A25.32 25.32 0 0 0 4.3 4.304a2.693 2.693 0 0 0-1.882 1.882A28.188 28.188 0 0 0 2.001 12a28.188 28.188 0 0 0 .417 5.814 2.693 2.693 0 0 0 1.882 1.882 25.32 25.32 0 0 0 7.7 1.304 25.32 25.32 0 0 0 7.7-1.304 2.693 2.693 0 0 0 1.882-1.882A28.188 28.188 0 0 0 21.999 12a28.188 28.188 0 0 0-.417-5.814zM9.75 15.5V8.5l6 3.5-6 3.5z"></path></svg>
                        </a>
                         {{-- <a href="#" class="bg-sky-500 p-2 rounded-md hover:bg-sky-600 transition-colors">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02 2.59.02 4.82 1.96 5.34 4.79.05.28.09.57.1.86.04 1.16.02 2.33 0 3.49-.02.93-.11 1.86-.29 2.78-.34 1.7-.85 3.36-1.74 4.88-.91 1.54-2.2 2.78-3.79 3.65-1.16.63-2.43 1.01-3.76 1.15-1.4.14-2.82.13-4.22 0-2.22-.21-4.23-.97-5.91-2.24C1.04 18.2.36 16.65 0 14.96-.15 13.82-.23 12.67-.22 11.52c.01-1.37.01-2.73 0-4.1.02-3.4 2.32-6.14 5.6-6.41.27-.02.54-.04.81-.04 2.1-.03 4.19-.03 6.29-.02zM7.99 6.82c-1.75 0-3.17 1.42-3.17 3.17 0 1.75 1.42 3.17 3.17 3.17s3.17-1.42 3.17-3.17c0-1.75-1.42-3.17-3.17-3.17zm3.8-1.38c.53 0 .97.43.97.97s-.43.97-.97.97-.97-.43-.97-.97.43-.97.97-.97zm4.39 2.54c-1.16 0-2.1.94-2.1 2.1s.94 2.1 2.1 2.1 2.1-.94 2.1-2.1-.94-2.1-2.1-2.1z"></path></svg>
                        </a> --}}
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-sky-300">Info Lainnya</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-300 hover:text-white">Haji Khusus</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Saudi Tourism Authority</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Wisata Halal</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Wakaf Quran</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Daftar Jadi Mitra</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Daftar Jadi Agen</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                     <h3 class="text-lg font-semibold mb-4 text-sky-300">Kantor Pekanbaru</h3>
                     <address class="not-italic text-sm text-gray-300 leading-relaxed">
                        Jl. Parit Indah No 151,<br>
                        Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru<br>
                        0821-8536-2223
                     </address>
                     {{-- <h3 class="text-lg font-semibold mt-6 mb-4 text-sky-300">Kantor Bandung</h3>
                     <address class="not-italic text-sm text-gray-300 leading-relaxed">
                        Jl. Kejaksaan No.37A, Braga, Kec.<br>
                        Sumur Bandung, Kota Bandung<br>
                        022-4206823
                     </address> --}}
                </div>
                <div>
                     <h3 class="text-lg font-semibold mb-4 text-sky-300">Mitra Cabang</h3>
                     <ul class="space-y-2 text-sm text-gray-300">
                        <li>Pekanbaru</li>
                        <li>Indragiri Hulu</li>
                        <li>Bangkinang</li>
                        <li>Duri</li>
                     </ul>
                </div>
            </div>
            <div class="border-t border-sky-800 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>Copyright © 2025 – MMB Travel</p>
            </div>
        </div>
    </footer>

    <a href="{{ route('consultation.index') }}" class="fixed bottom-5 right-5 bg-sky-500 hover:bg-sky-600 text-white p-4 rounded-full shadow-lg flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
        <span>Form Konsultasi</span>
    </a>
    
    <script>
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburgerButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- Ini penting agar script yang Anda tambahkan di @push('scripts') bisa terpanggil --}}
@stack('scripts') 

</body>
</html>