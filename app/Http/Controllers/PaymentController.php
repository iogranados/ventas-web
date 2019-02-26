<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function index(){
        return view("payment.index");
    }

    public function getData(){
        return DataTables::of(Payment::query())->make(true);
    }
}
