<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Menampilkan halaman daftar semua paket umroh.
     */
    public function index()
    {
        // Ambil semua paket yang statusnya 'is_active' = true
        // Urutkan berdasarkan tanggal keberangkatan terdekat
        // Tampilkan 12 paket per halaman
        $packages = Package::where('is_active', true)
                           ->orderBy('departure_date', 'asc')
                           ->paginate(12);

        return view('packages.index', compact('packages'));
    }
    public function show(string $slug)
    {
        // Cari paket berdasarkan slug-nya.
        // ->with('featured') akan otomatis mengambil data tambahan dari tabel featured_packages jika ada.
        // ->firstOrFail() akan otomatis menampilkan halaman 404 Not Found jika paket tidak ditemukan.
        $package = Package::where('slug', $slug)
                          ->with('featured')
                          ->firstOrFail();

        return view('packages.show', compact('package'));
    }
}