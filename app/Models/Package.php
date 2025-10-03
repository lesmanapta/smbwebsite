<?php

namespace App\Models; // <-- Pastikan namespace-nya App\Models

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'duration_days',
        'price',
        'departure_date',
        'description',
        'flyer_image',
        'is_active',
    ];
    protected $casts = [
        'gallery_images' => 'array',
        'advantages_list' => 'array',
        'facilities' => 'array',
        'departure_date' => 'date', // Baris ini yang memperbaiki error
    ];
    // Relasi ini juga penting untuk kelengkapan
    public function featured()
    {
        return $this->hasOne(FeaturedPackage::class);
    }
}