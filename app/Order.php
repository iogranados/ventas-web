<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "app_id", "dateorder",
        "customer_id", "seller_id", "datedelivery",
        "paymenttype", "receiptType", "imei",
        "latitude", "longitude", "semaphore",
        "statusDownloaded", "orderInterna"
    ];

    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function items(){
        return $this->hasMany('App\OrderItem');
    }
}
