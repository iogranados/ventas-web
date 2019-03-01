<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Seller;
use Illuminate\Http\Request;
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

    public function getData(){

        return DataTables::of(Customer::all())->make(true);
    }
}
