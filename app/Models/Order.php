<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function users() {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function payments() {
        return $this->belongsTo('App\Models\Payment','id_payment');
    }

    public function ship() {
        return $this->belongsTo('App\Models\Ship','id_shipping');
    }

    public function orderDetail() {
        return $this->hasMany('App\Models\Orderdetail','order_id');
    }

    protected $fillable = [
        'id_user',
        'id_payment',
        'id_shipping',
        'quantity',
        'total',
        'status',
        'des',
    ];
}
