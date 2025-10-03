@extends('layouts.app')

<script src="//unpkg.com/alpinejs" defer></script>

@section('title', $package->title . ' - MMB Travel')

@section('content')
<div class="container mx-auto max-w-6xl p-4 sm:p-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:gap-8">
            {{-- Bagian Deskripsi --}}
            <div class="lg:col-span-2 p-6 sm:p-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ $package->title }}</h1>
                <img src="{{ asset('storage/' . $package->flyer_image) }}" alt="{{ $package->title }}" class="w-full h-auto object-cover rounded-lg shadow-md mb-8">
                
                <div class="prose max-w-none text-gray-700">
                    {{-- <h2 class="text-xl sm:text-2xl border-b pb-2">Deskripsi Paket</h2> --}}
                    <div class="text-sm sm:text-base leading-relaxed">
                        {!! $package->description !!}
                    </div>
                </div>

                {{-- Accordion Biaya & Catatan --}}
                <div x-data="{ open: '' }" class="space-y-4 mt-12">

                    {{-- Biaya Sudah Termasuk --}}
                    @if($package->cost_includes)
                    <div class="border rounded-lg overflow-hidden">
                        <button @click="open = (open === 'includes' ? '' : 'includes')" 
                                class="flex justify-between items-center w-full p-4 bg-gray-50 hover:bg-gray-100 transition">
                            <h3 class="font-semibold text-gray-800 flex items-center">
                                <x-heroicon-o-check-circle class="w-5 h-5 mr-2 text-green-500 shrink-0" /> 
                                Biaya Sudah Termasuk
                            </h3>
                            <span x-bind:class="open === 'includes' ? 'rotate-180' : ''" 
                                  class="inline-block transition-transform duration-300">
                                <x-heroicon-o-chevron-down class="w-5 h-5"/>
                            </span>
                        </button>
                    
                        {{-- Tampilkan isi dengan icon per baris --}}
                        <div x-show="open === 'includes'" x-collapse.duration.300ms 
                            class="p-4 border-t text-gray-700 text-sm bg-white">
                            <ul class="space-y-2">
                                @foreach(preg_split('/<\/li>/', $package->cost_includes) as $item)
                                    @php
                                        $clean = trim(strip_tags($item));
                                    @endphp
                                    @if($clean != '')
                                        <li class="flex items-start">
                                            <x-heroicon-o-check-circle class="w-5 h-5 mr-2 text-green-500 shrink-0" />
                                            <span>{{ $clean }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    

                    {{-- Biaya Belum Termasuk --}}
                    @if($package->cost_excludes)
                    <div class="border rounded-lg overflow-hidden">
                        <button @click="open = (open === 'excludes' ? '' : 'excludes')" 
                                class="flex justify-between items-center w-full p-4 bg-gray-50 hover:bg-gray-100 transition">
                            <h3 class="font-semibold text-gray-800 flex items-center">
                                <x-heroicon-o-x-circle class="w-5 h-5 mr-2 text-red-500 shrink-0" />
                                Biaya Belum Termasuk
                            </h3>
                            <span x-bind:class="open === 'excludes' ? 'rotate-180' : ''" 
                                class="inline-block transition-transform duration-300">
                                <x-heroicon-o-chevron-down class="w-5 h-5"/>
                            </span>
                        </button>

                        {{-- Tampilkan isi dengan icon per baris --}}
                        <div x-show="open === 'excludes'" x-collapse.duration.300ms 
                            class="p-4 border-t text-gray-700 text-sm bg-white">
                            <ul class="space-y-2">
                                @foreach(preg_split('/<\/li>/', $package->cost_excludes) as $item)
                                    @php
                                        $clean = trim(strip_tags($item));
                                    @endphp
                                    @if($clean != '')
                                        <li class="flex items-start">
                                            <x-heroicon-o-x-circle class="w-5 h-5 mr-2 text-red-500 shrink-0" />
                                            <span>{{ $clean }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif


                    {{-- Catatan --}}
                    @if($package->notes)
                    <div class="border rounded-lg overflow-hidden">
                        <button @click="open = (open === 'notes' ? '' : 'notes')" 
                                class="flex justify-between items-center w-full p-4 bg-gray-50 hover:bg-gray-100 transition">
                            <h3 class="font-semibold text-gray-800 flex items-center">
                                <x-heroicon-o-document-text class="w-5 h-5 mr-2 text-amber-500 shrink-0" />
                                Catatan
                            </h3>
                            <span x-bind:class="open === 'notes' ? 'rotate-180' : ''" 
                                class="inline-block transition-transform duration-300">
                                <x-heroicon-o-chevron-down class="w-5 h-5"/>
                            </span>
                        </button>

                        {{-- Tampilkan isi dengan icon per baris --}}
                        <div x-show="open === 'notes'" x-collapse.duration.300ms 
                            class="p-4 border-t text-gray-700 text-sm bg-white">
                            <ul class="space-y-2">
                                @foreach(preg_split('/<\/li>/', $package->notes) as $item)
                                    @php
                                        $clean = trim(strip_tags($item));
                                    @endphp
                                    @if($clean != '')
                                        <li class="flex items-start">
                                            <x-heroicon-o-document-text class="w-5 h-5 mr-2 text-amber-500 shrink-0" />
                                            <span>{{ $clean }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            {{-- Bagian Sidebar Harga & Info --}}
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
                    
                        {{-- Info Paket --}}
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
                    
                                {{-- Hotel --}}
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