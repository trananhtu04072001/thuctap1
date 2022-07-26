<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    public function admin() {
        return $this->belongsTo('App\Models\Admin','id_admin');
    }

    protected $table = 'import';

    protected $fillable = [
        'code_import',
        'importdate',
        'supplier',
        'status',
        'unit_price',
        'quantity',
        'id_admin',
    ];
}
