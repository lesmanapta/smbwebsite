<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('featured_packages', function (Blueprint $table) {
            $table->id();
            
            // INI BAGIAN YANG HILANG DAN PALING PENTING
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            
            $table->string('flight_type')->nullable();
            $table->string('airline')->nullable();
            $table->string('hotel_1_name')->nullable();
            $table->integer('hotel_1_stars')->nullable();
            $table->string('hotel_2_name')->nullable();
            $table->integer('hotel_2_stars')->nullable();
            $table->string('status')->default('Tersedia');
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_packages');
    }
};