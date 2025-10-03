<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('advantages', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // Kita simpan nama ikon, misal 'heroicon-o-check-circle'
            $table->string('title'); // Contoh: Berizin Resmi & Terintegrasi
            $table->text('description'); // Deskripsi singkat di bawah judul
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('advantages');
    }
};