@extends('layouts.app')

@section('title', $package->title . ' - MMB Travel')

@section('content')
    <div class="container mx-auto max-w-6xl p-4 sm:p-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:gap-8">
                <div class="lg:col-span-2 p-6 sm:p-8">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ $package->title }}</h1>
                    <img src="{{ asset('storage/' . $package->flyer_image) }}" alt="{{ $package->title }}" class="w-full h-auto object-cover rounded-lg shadow-md mb-8">
                    
                    <div class="prose max-w-none text-gray-700">
                        <h2 class="text-xl sm:text-2xl border-b pb-2">Deskripsi Paket</h2>
                        {{-- Menggunakan text-sm untuk ukuran font deskripsi yang lebih kecil --}}
                        <div class="text-sm sm:text-base leading-relaxed">
                           {!! $package->description !!}
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 sm:p-8">
                    <div class="sticky top-28">
                        
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            {{-- Harga --}}
                            <div class="flex items-center mb-6">
                                <x-heroicon-o-banknotes class="w-7 h-7 mr-3 text-sky-600"/>
                                <div>
                                    <p class="text-xs text-gray-500">Harga Mulai</p>
                                    <h3 class="text-2xl font-bold text-sky-700">
                                        Rp {{ number_format($package->price, 0, ',', '.') }}
                                    </h3>
                                </div>
                            </div>
                        
                            {{-- Info Paket pakai grid card kecil --}}
                            <div class="grid grid-cols-1 gap-3">
                                {{-- Keberangkatan --}}
                                <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-3 text-sky-500"/>
                                    <div>
                                        <p class="text-xs text-gray-500">Keberangkatan</p>
                                        <p class="font-semibold">
                                            {{ \Carbon\Carbon::parse($package->departure_date)->isoFormat('D MMMM YYYY') }}
                                        </p>
                                    </div>
                                </div>
                        
                                {{-- Durasi --}}
                                <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                    <x-heroicon-o-clock class="w-5 h-5 mr-3 text-sky-500"/>
                                    <div>
                                        <p class="text-xs text-gray-500">Durasi</p>
                                        <p class="font-semibold">{{ $package->duration_days }} Hari</p>
                                    </div>
                                </div>
                        
                                {{-- Penerbangan --}}
                                @if($package->featured)
                                    <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                        <x-heroicon-o-paper-airplane class="w-5 h-5 mr-3 text-sky-500 -rotate-45"/>
                                        <div>
                                            <p class="text-xs text-gray-500">Penerbangan</p>
                                            <p class="font-semibold">{{ $package->featured->airline }} ({{ $package->featured->flight_type }})</p>
                                        </div>
                                    </div>
                        
                                    {{-- Hotel 1 --}}
                                    @if($package->featured->hotel_1_name)
                                        <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                            <x-heroicon-o-building-office-2 class="w-5 h-5 mr-3 text-sky-500"/>
                                            <div>
                                                <p class="text-xs text-gray-500">Hotel 1</p>
                                                <p class="font-semibold">
                                                    {{ $package->featured->hotel_1_name }} ({{ $package->featured->hotel_1_stars }}⭐)
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                        
                                    {{-- Hotel 2 --}}
                                    @if($package->featured->hotel_2_name)
                                        <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                            <x-heroicon-o-building-office-2 class="w-5 h-5 mr-3 text-sky-500"/>
                                            <div>
                                                <p class="text-xs text-gray-500">Hotel 2</p>
                                                <p class="font-semibold">
                                                    {{ $package->featured->hotel_2_name }} ({{ $package->featured->hotel_2_stars }}⭐)
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                        
                                    {{-- Ketersediaan --}}
                                    <div class="flex items-center p-3 border rounded-lg hover:bg-sky-50">
                                        <x-heroicon-o-check-circle class="w-5 h-5 mr-3 text-sky-500"/>
                                        <div>
                                            <p class="text-xs text-gray-500">Ketersediaan</p>
                                            <p class="font-bold 
                                                @if($package->featured->status == 'Full Booked') text-red-500 @endif
                                                @if($package->featured->status == 'Terbatas') text-yellow-500 @endif
                                                @if($package->featured->status == 'Tersedia') text-green-500 @endif
                                            ">
                                                {{ $package->featured->status }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        

                        <a href="{{ route('consultation.index') }}" class="mt-8 w-full block text-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-colors text-lg">
                            Konsultasi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection