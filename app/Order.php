<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        "codsale", "codorder",  "dateorder",
        "customer_id", "seller_id", "datedelivery",
        "paymenttype", "receiptType", "imei",
        "latitude", "longitude", "semaphore",
        "statusDownloaded"
    ];

    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
