<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','status','city_id','total','notes'];
    public function user(){ return $this->belongsTo(\App\Models\User::class); }
    public function items(){ return $this->hasMany(OrderItem::class); }
    public function delivery(){ return $this->hasOne(Delivery::class); }
    public function city(){ return $this->belongsTo(City::class); }
}
