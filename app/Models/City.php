<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','code'];
    public function warehouses(){ return $this->hasMany(Warehouse::class); }
    public function orders(){ return $this->hasMany(Order::class); }
}
