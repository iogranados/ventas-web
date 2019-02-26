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
}
