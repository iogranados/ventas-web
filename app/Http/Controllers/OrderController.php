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

    public function createOrders(Request $req){
        if ($req->isJson()){
            try{
                $dataList = $req->json()->all();
                $orderList = [];
                foreach ($dataList as $data){
                    $order = [
                        "app_id" => $data["app_id"],
                        "dateorder" => $data["dateorder"],
                        "customer_id" => $data["customer_id"],
                        "seller_id" => $data["seller_id"],
                        "datedelivery" => $data["datedelivery"],
                        "paymenttype" => $data["paymenttype"],
                        "receiptType" => $data["receiptType"],
                        "imei" => $data["imei"],
                        "latitude" => $data["latitude"],
                        "longitude" => $data["longitude"],
                        "semaphore" => $data["semaphore"],
                        "statusDownloaded" => $data["statusDownloaded"],
                        "orderInterna" => $data["orderInterna"],
                    ];

                    $order = Order::create($order);

                    $items = $data["itemPosts"];

                    foreach ($items as $item) {
                        $itemToInsert = [
                            "order_id" => $order->id,
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
                        OrderItem::create($itemToInsert);
                    }
                    array_push($orderList, $order);
                }
                return response()->json($orderList, 200);
            } catch(Exception $e){
                return response()->json($e->getMessage(), 500);
            }
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    public function createOrder(Request $request){
        if ($request->isJson()){
            try {
                $data = $request->json()->all();
                $order = [
                    "app_id" => $data["app_id"],
                    "dateorder" => $data["dateorder"],
                    "customer_id" => $data["customer_id"],
                    "seller_id" => $data["seller_id"],
                    "datedelivery" => $data["datedelivery"],
                    "paymenttype" => $data["paymenttype"],
                    "receiptType" => $data["receiptType"],
                    "imei" => $data["imei"],
                    "latitude" => $data["latitude"],
                    "longitude" => $data["longitude"],
                    "semaphore" => $data["semaphore"],
                    "statusDownloaded" => $data["statusDownloaded"],
                    "orderInterna" => $data["orderInterna"],
                ];

                $order = Order::create($order);

                $items = $data["itemPosts"];

                foreach ($items as $item) {
                    $itemToInsert = [
                        "order_id" => $order->id,
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
                    OrderItem::create($itemToInsert);
                }
            } catch (Exception $e){
                return response()->json($e->getMessage(), 500);
            }

            return response()->json($order, 200);

        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }
}
