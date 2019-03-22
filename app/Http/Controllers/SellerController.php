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
        return DataTables::of(Seller::query())->make(true);
    }

    public function get(){
        $sellers = Seller::all();
        return response()->json($sellers, 200);
    }
}
