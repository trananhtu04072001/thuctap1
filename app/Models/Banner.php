<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Banner extends Authenticatable
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'image',
        'des',
    ];
}
