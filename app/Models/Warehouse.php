<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name','location','city_id','lat','lng'];
    public function city(){ return $this->belongsTo(City::class); }
    public function stocks(){ return $this->hasMany(WarehouseStock::class); }
}
