<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
    use HasFactory;

    protected $table = 'products';

    public function Orderdetail() {
        return $this->hasMany('App\Models\Orderdetail');
    }
    protected $fillable = [
        'name',
        'price',
        'image',
        'des',
        'view',
        'status',
        'id_brand',
        'id_type', 
    ];
}
