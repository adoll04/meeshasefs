<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $fillable=[
        'category',
        'description',
        'acquired_value',
        'acquired_date',
        'recent_value',
        'recent_date',
        'customer_id',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
