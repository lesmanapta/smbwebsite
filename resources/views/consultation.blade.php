<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Gratis - MMB Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    {{-- Anda bisa include header dari halaman utama di sini jika mau --}}
    {{-- @include('layouts.header') --}}

    <div class="container mx-auto max-w-6xl p-4 sm:p-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="hidden md:block">
                    <img src="{{ asset('home2.jpg') }}" alt="Jamaah Umroh MMB Travel" class="w-full h-full object-cover">
                    {{-- Ganti 'home-konsultasi.jpg' dengan nama gambar Anda di folder public --}}
                </div>

                <div class="p-8 lg:p-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Rencanakan perjalanan ibadah umroh Anda bersama kami.</h2>
                    <p class="text-gray-600 mb-6">Isi formulir konsultasi untuk mendapatkan informasi lebih lanjut perihal umroh dan haji.</p>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('consultation.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Panggilan</label>
                            <select id="title" name="title" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500">
                                <option>Pilih Panggilan</option>
                                <option>Bapak</option>
                                <option>Ibu</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500" placeholder="Nama Lengkap Anda">
                        </div>

                        <div>
                            <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" id="whatsapp_number" name="whatsapp_number" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500" placeholder="08123456789">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                             <div>
                                <label for="package_name" class="block text-sm font-medium text-gray-700">Paket Umroh</label>
                                <select id="package_name" name="package_name" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500">
                                    <option>Pilih Paket</option>
                                    <option>Umroh Hemat</option>
                                    <option>Umroh Plus Turki</option>
                                    <option>Umroh Plus Mesir</option>
                                </select>
                            </div>
                            <div>
                                <label for="planned_departure" class="block text-sm font-medium text-gray-700">Rencana Bulan Keberangkatan</label>
                                <select id="planned_departure" name="planned_departure" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500">
                                    <option>Pilih Bulan</option>
                                    <option>Oktober 2025</option>
                                    <option>November 2025</option>
                                    <option>Desember 2025</option>
                                    <option>Januari 2026</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
                                Konsultasi Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Anda bisa include footer dari halaman utama di sini jika mau --}}
    {{-- @include('layouts.footer') --}}

</body>
</html>