<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Atribute extends Authenticatable
{
    use HasFactory;

    protected $table = 'atributes';
    
    protected $fillable = [
        'id_atrgroup',
        'value',
    ];

    public function atrgroup() {
        return $this->belongsTo('App\Models\AtributeGroup','id_atrgroup');
    }
}
