<?php

namespace App\Http\Controllers;

use App\Seller;
use Yajra\DataTables\DataTables;

class SellerController extends Controller
{
    public function index(){
        /*$sellers = Seller::all();
        return view("seller.index")->with('sellers', $sellers);*/
        return view("seller.index");
    }

    public function getData(){
        return DataTables::of(Seller::all())->make(true);
    }
}
