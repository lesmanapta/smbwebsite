<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('consultations', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable(); // Panggilan (Tuan, Nyonya, dll)
        $table->string('name');
        $table->string('whatsapp_number');
        $table->string('package_name')->nullable(); // Paket Umroh
        $table->string('planned_departure')->nullable(); // Rencana Keberangkatan
        $table->string('status')->default('Baru'); // Status: Baru, Dihubungi, Selesai
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
