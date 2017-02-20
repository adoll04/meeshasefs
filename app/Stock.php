<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable= array(
        'customer_id',
        'symbol',
        'name',
        'shares',
        'purchase_price',
        'purchased',
        'recent_value',
        'current_value' ,
        'current_price'

    );

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

