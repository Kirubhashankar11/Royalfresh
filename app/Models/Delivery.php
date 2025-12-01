<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['order_id','warehouse_id','scheduled_date','time_slot','status','notes'];
    public function order(){ return $this->belongsTo(Order::class); }
    public function warehouse(){ return $this->belongsTo(Warehouse::class); }
}
