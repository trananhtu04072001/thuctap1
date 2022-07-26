<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $table = "order_detail";

    public function order() {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function receiver() {
        return $this->belongsTo('App\Models\Receiver','receiver_id');
    }

    public function product() { 
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function payment() {
        return $this->belongsTo('App\Models\Payment','payment_id');
    }

    public function ship() {
        return $this->belongsTo('App\Models\Ship','ship_id');
    }

    protected $fillable = [
        'order_id',
        'receiver_id',
        'product_id',
        'payment_id',
        'ship_id',
        'single_quantity',
        'total',
    ];
}
