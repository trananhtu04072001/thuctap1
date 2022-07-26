<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventProducts extends Model
{
    use HasFactory;

    protected $table = 'eventproducts';

    protected $fillable = [
        'id_event',
        'id_product',
        'discount',
        'start',
        'end',
        'status',
    ];

    public function event() {
        return $this->belongsTo('App\Models\Event','id_event');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product','id_product');
    }
}
