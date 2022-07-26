<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importdetail extends Model
{
    use HasFactory;

    protected $table = 'importdetail';

    public function import() {
        return $this->belongsTo('App\Models\Import','id_import');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product','id_product');
    }

    protected $fillable = [
        'id_import',
        'id_product',
        'quantity',
    ];
}
