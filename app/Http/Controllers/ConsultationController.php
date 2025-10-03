<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    // Menampilkan halaman form
    public function index()
    {
        return view('consultation');
    }

    // Menyimpan data dari form
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'package_name' => 'nullable|string|max:255',
            'planned_departure' => 'nullable|string|max:255',
        ]);

        Consultation::create($validatedData);

        return redirect()->route('consultation.index')
            ->with('success', 'Terima kasih! Formulir konsultasi Anda telah kami terima. Tim kami akan segera menghubungi Anda.');
    }
}
