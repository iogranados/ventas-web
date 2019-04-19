<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index(){
        /*$customers = Customer::all();
        return view("customer.index")->with('customers', $customers);*/
        //$sellers = Seller::all()->sortByDesc('NOMVEN')->pluck('NOMVEN', 'CODVEN');
        $sellers = Seller::all()->sortByDesc('NOMVEN');//->pluck('NOMVEN', 'CODVEN');

        //dd($sellers);
        return view("customer.index")->with('sellers', $sellers);
    }

    public function getData(Request $req){
        $codSeller = $req->query('codSeller');
        $customers = [];
        if($codSeller == 'ALL'){
            $customers = Customer::all();
        } else {
            $customers = Customer::query()->where('CODVEN', $codSeller);
        }

        return DataTables::of($customers)->make(true);
    }

    public function get(Request $req, Response $res)
    {
        if ($req->has('controlId')) {
            $customers = Customer::where('control_id', $req->controlId)->get();
        } else if($req->has('codVen')){
            $customers = Customer::where('CODVEN', $req->codVen)->get();
        }else {
            $customers = Customer::all();
        }

        if($customers==null){
            return response()->json($customers, 404);
        }
        return response()->json($customers, 200);
    }

    public function getFromRange(Request $req){
        if($req->has('controlIdFrom') && $req->has('controlIdTo')){
            $customers =
                Customer::where('control_id', '>', $req->controlIdFrom)
                    ->where('control_id', '<=', $req->controlIdTo)
                    ->get();
        } else {
            return response()->json('{"error":"not found"}', 400);
        }

        if($customers == null){
            return response()->json($customers, 404);
        }

        return response()->json($customers, 200);
    }
}
