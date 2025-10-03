<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'whatsapp_number',
        'package_name',
        'planned_departure',
        'status',
    ];
}