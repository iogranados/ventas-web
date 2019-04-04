<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(){
        return view("product.index");
    }

    public function getData(){
        return DataTables::of(Product::query())->make(true);
    }

    public function get(Request $req){
        if($req->has('controlId')){
            $products = Product::where('control_id', $req->controlId)->get();
        } else {
            $products = Product::all();
        }

        if($products == null){
            return response()->json($products, 404);
        }

        return response()->json($products, 200);
    }
}
