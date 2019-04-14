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

    public function getFromRange(Request $req){
        if($req->has('controlIdFrom') && $req->has('controlIdTo')){
            $sellers =
                Seller::where('control_id', '>', $req->controlIdFrom)
            ->where('control_id', '<=', $req->controlIdTo)
                    ->get();
        } else {
            return response()->json('{"error":"not found"}', 400);
        }

        if($sellers == null){
            return response()->json($sellers, 404);
        }

        return response()->json($sellers, 200);
    }

    public function login(Request $req){
        if($req->has("imei")){
            $seller = Seller::where("imei", $req->imei)->first();
        } else {
            return response()->json('{"error":"not imei"}', 400);
        }

        if($seller == null){
            return response()->json('{"error":"not found"}', 400);
        }

        return response()->json($seller, 200);
    }
}
