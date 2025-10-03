@extends('layouts.app')

@section('title', 'Travel Umrah & Haji Terpercaya')

@section('content')
    <section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('{{ asset('home1.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative text-center p-4">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold">Travel Umroh Terbaik & Terpercaya</h1>
            <p class="text-lg sm:text-xl mt-4">Selalu Memberikan pelayanan Terbaik demi Keamanan & Kenyamanan Ibadah Anda dan Keluarga.</p>
            <a href="{{ route('consultation.index') }}" class="mt-8 inline-block bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition-colors">Konsultasi Gratis</a>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto max-w-6xl text-center px-4">
            <h2 class="text-2xl sm:text-3xl font-bold mb-4">Alasan kenapa harus memilih Kami</h2>
            <p class="text-gray-500 max-w-2xl mx-auto mb-12 text-sm sm:text-base">Rasakan pengalaman ibadah umroh yang aman dan nyaman bersama kami.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($advantages as $advantage)
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="bg-sky-600 text-white w-14 h-14 rounded-full mx-auto flex items-center justify-center mb-4">
                        @if(!empty($advantage->icon) && str_starts_with($advantage->icon, 'heroicon-'))
                            <x-dynamic-component :component="$advantage->icon" class="w-7 h-7" />
                        @else
                            <svg xmlns="http://www.w.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $advantage->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $advantage->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-sky-950 py-20">
        <div class="container mx-auto max-w-6xl px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white lg:pr-8">
                    <h2 class="text-3xl sm:text-4xl font-bold mb-6">MMB Travel, Travel Umroh & Haji Terbaik dan Terpercaya</h2>
                    <p class="text-gray-300 leading-relaxed mb-4">
                        Salah satu dari 5 Travel Umroh Terbaik BPW beserta Amphuri dan Himpuh yang menandatangani MOU dengan Saudi Tourism Authority untuk mempromosikan wisata Saudi.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-8">
                        MMB Travel juga telah berpengalaman selama puluhan tahun memberangkatkan jamaah ke Tanah Suci dengan fasilitas terbaik untuk Keamanan & Kenyamanan Jamaah.
                    </p>
                    <a href="{{ route('consultation.index') }}" class="inline-flex items-center bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 px-6 rounded-lg transition-colors text-lg">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Konsultasi Gratis</span>
                    </a>
                </div>
                <div class="relative min-h-[400px] sm:min-h-[450px]">
                    <img src="{{ asset('home2.jpg') }}" alt="Meeting with Saudi Tourism Authority" class="absolute w-3/4 top-0 right-0 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('home3.jpg') }}" alt="Signing MOU" class="absolute w-2/3 bottom-0 left-0 rounded-lg shadow-xl border-4 border-sky-950 transform hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="container mx-auto max-w-6xl text-center px-4">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Program Umroh Pilihan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">Tanggal keberangkatan terdekat program umroh pilihan kami.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($featuredPackages as $featured)
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative">
                        <a href="{{ route('packages.show', $featured->package->slug) }}">
                            <img src="{{ asset('storage/' . $featured->package->flyer_image) }}" alt="{{ $featured->package->title }}" class="w-full h-56 object-cover">
                        </a>
                        
                        @if($featured->status === 'Full Booked')
                        <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-30">
                            <div class="bg-red-600 text-white text-lg font-bold uppercase px-6 py-1 transform -rotate-12 border-4 border-white opacity-90 rounded-md">
                                Fully Booked
                            </div>
                        </div>
                        @endif
                    </div>
            
                    <div class="p-4 flex flex-col flex-grow">
                        <p class="text-gray-500 text-xs mb-2 flex items-center">
                            <x-heroicon-o-calendar-days class="w-4 h-4 mr-2 text-gray-400"/>
                            <span>{{ \Carbon\Carbon::parse($featured->package->departure_date)->isoFormat('D MMM YYYY') }}</span>
                            <span class="mx-1.5">•</span>
                            <span>{{ $featured->package->duration_days }} Hari</span>
                        </p>
            
                        <h3 class="text-base font-bold text-gray-900 mb-3 leading-tight">
                             <a href="{{ route('packages.show', $featured->package->slug) }}" class="hover:text-sky-600 transition-colors">
                                {{ $featured->package->title }}
                            </a>
                        </h3>
            
                        @if($featured->airline)
                        <div class="flex items-center space-x-2 text-xs text-gray-700 mb-4">
                            <span class="inline-flex items-center font-semibold bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full">
                                <x-heroicon-s-globe-alt class="w-3 h-3 mr-1"/>
                                {{ $featured->flight_type }}
                            </span>
                            <span class="inline-flex items-center bg-gray-100 text-gray-800 px-2 py-0.5 rounded-full">
                                <x-heroicon-s-paper-airplane class="w-3 h-3 mr-1 -rotate-45"/>
                                {{ $featured->airline }}
                            </span>
                        </div>
                        @endif
            
                        <div class="space-y-1.5 text-xs text-gray-800 mb-4 flex-grow">
                            @if($featured->hotel_1_name)
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <x-heroicon-s-building-office-2 class="w-4 h-4 mr-2 text-gray-400"/>
                                    <span>{{ $featured->hotel_1_name }} *{{ $featured->hotel_1_stars }}</span>
                                </div>
                                <div class="flex">
                                    @for($i = 0; $i < $featured->hotel_1_stars; $i++)
                                    <x-heroicon-s-star class="w-3 h-3 text-yellow-400"/>
                                    @endfor
                                </div>
                            </div>
                            @endif
                            @if($featured->hotel_2_name)
                             <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <x-heroicon-s-building-office-2 class="w-4 h-4 mr-2 text-gray-400"/>
                                    <span>{{ $featured->hotel_2_name }} *{{ $featured->hotel_2_stars }}</span>
                                </div>
                                <div class="flex">
                                     @for($i = 0; $i < $featured->hotel_2_stars; $i++)
                                    <x-heroicon-s-star class="w-3 h-3 text-yellow-400"/>
                                    @endfor
                                </div>
                            </div>
                            @endif
                        </div>
            
                        <div class="border-t pt-3 mt-auto">
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-xs text-gray-500">Harga Mulai</p>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a1 1 0 011-1h5a1 1 0 01.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                        <p class="text-lg font-bold text-red-600">{{ number_format($featured->package->price / 1000000, 1, ',', '.') }} Juta</p>
                                    </div>
                                </div>
                                <div>
                                    @if($featured->status === 'Full Booked')
                                        <a href="{{ route('packages.show', $featured->package->slug) }}" class="bg-red-500 text-white font-bold py-2 px-3 rounded-md text-xs">Full Booked</a>
                                    @elseif($featured->status === 'Terbatas')
                                        <a href="{{ route('packages.show', $featured->package->slug) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 rounded-md text-xs transition-colors">Terbatas</a>
                                    @else
                                         <a href="{{ route('packages.show', $featured->package->slug) }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-3 rounded-md text-xs transition-colors">Lihat Detail</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-span-full text-center text-gray-500">Belum ada paket yang ditampilkan di homepage saat ini.</p>
                @endforelse
            </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto max-w-6xl text-center px-4">
             <h2 class="text-3xl sm:text-4xl font-bold mb-12">Testimoni Jamaah Umroh</h2>
             <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($testimonials as $testimonial)
                <div class="rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $testimonial->testimonial_image) }}" alt="Testimoni" class="w-full h-auto">
                </div>
                @endforeach
             </div>
        </div>
    </section>
@endsection