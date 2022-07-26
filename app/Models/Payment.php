<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payment_methods";

    protected $fillable = [
        'name',
    ];

    public function order() {
        return $this->hasMany('App\Models\Order','id_payment');
    }
}
