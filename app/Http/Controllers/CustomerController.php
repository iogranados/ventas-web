<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index(){
        /*$customers = Customer::all();
        return view("customer.index")->with('customers', $customers);*/
        return view("customer.index");
    }

    public function getData(){
        return DataTables::of(Customer::all())->make(true);
    }
}
