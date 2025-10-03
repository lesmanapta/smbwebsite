<?php

namespace App\Http\Controllers;

// Pastikan semua Model yang dibutuhkan sudah di-import di sini
use App\Models\Advantage;
use App\Models\FeaturedPackage; // DIUBAH: Menggunakan model FeaturedPackage
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama (beranda).
     */
    public function index()
    {
        // DIUBAH: Mengambil data paket yang dipilih untuk homepage dari tabel featured_packages
        $featuredPackages = FeaturedPackage::with('package')
                                           ->orderBy('display_order')
                                           ->get();

        // Ambil semua data keunggulan
        $advantages = Advantage::all();

        // Ambil semua testimoni, urutkan dari yang terbaru
        $testimonials = Testimonial::latest()->get();

        // DIUBAH: Mengirim variabel $featuredPackages (bukan $packages lagi) ke view 'home'
        return view('home', compact('featuredPackages', 'advantages', 'testimonials'));
    }
}