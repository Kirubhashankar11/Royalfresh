<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'time', 'charge'];

    protected $casts = [
        'city' => 'array', // JSON <-> array conversion
    ];
}