<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Image extends Authenticatable
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'id_product',
        'image',
    ];
}
