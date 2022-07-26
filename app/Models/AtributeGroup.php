<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtributeGroup extends Model
{
    use HasFactory;

    protected $table = 'AtributeGroups';

    protected $fillable = [
        'name',
    ];
}
