@extends('layouts.app')

@section('title', 'Daftar Paket Umroh - MMB Travel')

@section('content')
    <div class="container mx-auto max-w-6xl px-4 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Semua Paket Umroh</h1>
            <p class="text-gray-600 mt-2">Pilih paket perjalanan ibadah terbaik untuk Anda dan keluarga.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($packages as $package)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group flex flex-col">
                <a href="{{ route('packages.show', $package->slug) }}" class="block">
                    <img src="{{ asset('storage/' . $package->flyer_image) }}" alt="{{ $package->title }}" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-300">
                </a>
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-gray-500 text-sm mb-2">{{ \Carbon\Carbon::parse($package->departure_date)->isoFormat('D MMMM YYYY') }} - {{ $package->duration_days }} Hari</p>
                    <h3 class="text-lg font-bold text-gray-800 flex-grow">
                        <a href="{{ route('packages.show', $package->slug) }}" class="hover:text-sky-600 transition-colors">
                            {{ $package->title }}
                        </a>
                    </h3>
                    <div class="border-t pt-4 mt-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-gray-500">Harga Mulai</p>
                                <p class="text-lg font-bold text-sky-600">{{ number_format($package->price / 1000000, 1, ',', '.') }} Juta</p>
                            </div>
                            <a href="{{ route('packages.show', $package->slug) }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg text-sm transition-colors">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-500">Belum ada paket yang tersedia saat ini.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $packages->links() }}
        </div>

    </div>
@endsection