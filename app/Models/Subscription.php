<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription',
        'city',
        'milk_variety',
        'unit_1l_price',
        'unit_1_5l_price',
        'unit_500g_price',
        'unit_1kg_price',
    ];
}