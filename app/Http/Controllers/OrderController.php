<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(){
        return view("order.index");
    }

    public function getData(){
        $orders = Order::with('seller', 'customer')->get();

        return DataTables::of($orders)->make(true);
    }
}
