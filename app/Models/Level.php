<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Level extends Authenticatable
{
    use HasFactory;

    // public function admin() {
    //     return $this->hasMany('App\Models\Admin');
    // }

    protected $fillable = [
        'name',
    ];
}
