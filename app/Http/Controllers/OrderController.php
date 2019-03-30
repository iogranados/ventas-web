<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
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

    public function createOrder(Request $request){
        if ($request->isJson()){
            $data = $request->json()->all();
            $order = [
                "codsale" => $data["codsale"],
                "codorder"=> $data["codorder"],
                "dateorder"=> $data["dateorder"],
                "customer_id"=> $data["customer_id"],
                "seller_id"=> $data["seller_id"],
                "datedelivery"=> $data["datedelivery"],
                "paymenttype"=> $data["paymenttype"],
                "receiptType"=> $data["receiptType"],
                "imei"=> $data["imei"],
                "latitude"=> $data["latitude"],
                "longitude"=> $data["longitude"],
                "semaphore"=> $data["semaphore"],
                "statusDownloaded"=> $data["statusDownloaded"],
            ];

            $order = Order::create($order);

            $items = $data["items"];

            foreach ($items as $item){
                $itemToInsert = [
                    "order_id" => $order->id,
                    "codsale" => $item["codsale"],
                    "product_id" => $item["product_id"],
                    "quantity" => $item["quantity"],
                    "price" => $item["price"],
                    "typeunit" => $item["typeunit"],
                    "boxby" => $item["boxby"],
                    "typeprice" => $item["typeprice"],
                    "pricetlist" => $item["pricetlist"],
                    "codlevel" => $item["codlevel"],
                    "levelrangefrom" => $item["levelrangefrom"],
                    "levelrangeto" => $item["levelrangeto"],
                ];
                $itemToInsert = OrderItem::create($itemToInsert);

            }


            return response()->json($order, 200);

        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }
}
