<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
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

    public function get(Request $req){
        if($req->has('controlId')){
            $sellers = Seller::where('control_id', $req->controlId)->get();
        } else {
            $sellers = Seller::all();
        }

        if($sellers == null){
            return response()->json($sellers, 404);
        }

        return response()->json($sellers, 200);
    }
}
