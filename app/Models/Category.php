<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'category_id',
        // add other columns if you want them mass assignable, e.g. 'status'
    ];
   public function products()
{
    return $this->hasMany(Product::class, 'category_id');
}

}
