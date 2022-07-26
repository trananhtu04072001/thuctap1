<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $fillable = [
        'id_product',
        'quantity',
        'id_payment_method',
        'id_ships',
    ];
}
