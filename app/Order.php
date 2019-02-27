<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
