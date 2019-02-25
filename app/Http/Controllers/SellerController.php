<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        $sellers = Seller::all();
        return view("seller.index")->with('sellers', $sellers);
    }
}
