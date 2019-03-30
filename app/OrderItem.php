<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        "codsale", "order_id",  "product_id",
        "quantity", "price", "typeunit",
        "boxby", "typeprice", "pricetlist",
        "codlevel", "levelrangefrom", "levelrangeto",
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
