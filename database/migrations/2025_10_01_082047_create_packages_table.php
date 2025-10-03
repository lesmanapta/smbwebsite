<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Contoh: UMROH HEBAT
            $table->string('slug')->unique();
            $table->integer('duration_days'); // Contoh: 9
            $table->decimal('price', 10, 2); // Harga bisa pakai desimal
            $table->date('departure_date'); // Tanggal keberangkatan
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->string('flyer_image'); // Path ke gambar brosur/flyer
            $table->boolean('is_active')->default(true); // Untuk menampilkan/menyembunyikan paket
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};