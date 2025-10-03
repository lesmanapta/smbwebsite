<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeaturedPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'flight_type',
        'airline',
        'hotel_1_name',
        'hotel_1_stars',
        'hotel_2_name',
        'hotel_2_stars',
        'status',
        'display_order',
    ];

    /**
     * Mendefinisikan relasi ke model Package.
     * Kita buat lebih eksplisit dengan menyebutkan foreign key.
     */
    public function package(): BelongsTo
    {
        // PERUBAHAN DI SINI: Menambahkan 'package_id' secara eksplisit
        return $this->belongsTo(Package::class, 'package_id');
    }
}