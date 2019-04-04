<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
        'api_token' => Str::random(60),
        'reg_token' => Str::random(20),
    ];
});

$factory->define(App\Control::class, function (Faker $faker) {
    return [
        'table' => $faker->randomElement(array('T001', 'T002', 'T003'))
    ];
});

$factory->define(App\Seller::class, function (Faker $faker) {
    $controls = App\Control::all()->pluck('id')->toArray();
    return [
        'control_id' => $faker->randomElement($controls),
        'CODVEN' => $faker->randomNumber(4),
        'NOMVEN' => $faker->name,
        'DIRVEN' => $faker->streetAddress,
        'TELE01' => '991283049',
        'IDVENTA' => $faker->numberBetween(100, 400),
        'IMEI' => Str::random(20),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    $controls = App\Control::all()->pluck('id')->toArray();
    $sellers = \App\Seller::all()->pluck('CODVEN')->toArray();
    return [
        'control_id' => $faker->randomElement($controls),
        'CODCLI' => $faker->randomNumber(4),
        'NOMBRE' => $faker->name,
        'CODENTIDAD' => $faker->randomElement(array('6','1','4','7','A','0','-')),
        'NDOCUMENTO' => $faker->numberBetween(1000000, 9999999),
        'RUCLE' => $faker->numberBetween(1000000, 9999999),
        'SEMAFORO' => $faker->randomElement(array('V','A','R')),
        'CODVEN' => $faker->randomElement($sellers),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    $controls = App\Control::all()->pluck('id')->toArray();
    return [
        'control_id' => $faker->randomElement($controls),
        'codproduct' => $faker->randomNumber(9),
        'name' => $faker->name,
        'priceone' => $faker->randomNumber(2),
        'pricetwo' => $faker->randomNumber(2),
        'pricethree' => $faker->randomNumber(2),
        'pricerangenameone' => 1,
        'pricerangefromone' => 1,
        'pricerangetoone' => 4,
        'pricevaluefromone' => 100,
        'pricevaluetoone' => 110,
        'pricerangenametwo' => 2,
        'pricerangefromtwo' => 5,
        'pricerangetotwo' => 9,
        'pricevaluefromtwo' => 90,
        'pricevaluetotwo' => 100,
        'pricerangenamethree' => 3,
        'pricerangefromthree' => 10,
        'pricerangetothree' => 14,
        'pricevaluefromthree' => 80,
        'pricevaluetothree' => 90,
        'pricerangenamefour' => 4,
        'pricerangefromfour' => 15,
        'pricerangetofour' => 19,
        'pricevaluefromfour' => 70,
        'pricevaluetofour' => 80,
        'pricerangenamefive' => 5,
        'pricerangefromfive' => 20,
        'pricerangetofive' => 99,
        'pricevaluefromfive' => 60,
        'pricevaluetofive' => 70,
        'boxby' => $faker->randomNumber(2),
        'typeunit' => 'U',
        'priceoflist' => 100,
        'flagprice' => '0',
        'fecIniVig' => '20190312',
        'fecFinVig' => '20190312',
        'fecUv' => '20190312',
    ];
});

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'OPERACION' => $faker->randomNumber(4),
        'PEDIDOVTA' => $faker->randomNumber(4),
        'ID_PAYMENT' => $faker->numberBetween(10, 9999),
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    $sellers = \App\Seller::all()->pluck('id')->toArray();
    $customers = \App\Customer::all()->pluck('id')->toArray();
    return [
        'codsale' => $faker->randomNumber(4),
        'codorder' => $faker->randomNumber(4),
        'dateorder' => $faker->dateTimeThisMonth(),
        'customer_id' => $faker->randomElement($customers),
        'seller_id' => $faker->randomElement($sellers),
        'datedelivery' => $faker->dateTimeThisMonth(),
        'paymenttype' => $faker-> randomElement(array('01','02')),
        'receiptType' => $faker-> randomElement(array('1','2', '11')),
        'imei' => $faker -> randomNumber(8),
        'latitude' => $faker->randomFloat(6, 1, 9999),
        'longitude' => $faker->randomFloat(6, 1, 9999),
        'semaphore' => $faker-> randomElement(array('V','D', 'F')),
        'PedidoVta' => $faker->randomNumber(4),
        'PedidoPed' => $faker->randomNumber(4),
    ];
});

$factory->define(App\OrderItem::class, function (Faker $faker) {
    $ordersIds = \App\Order::all()->pluck('id')->toArray();
    $ordersCodeSale = \App\Order::all()->pluck('codsale')->toArray();
    $products = \App\Product::all()->pluck('id')->toArray();
    return [
        'codsale' => $faker->randomElement($ordersCodeSale),
        'order_id' => $faker->randomElement($ordersIds),
        'product_id' => $faker->randomElement($products),
        'quantity' => $faker-> randomFloat(2, 1, 100),
        'price' => $faker-> randomFloat(3, 1, 200),
        'typeunit' => '0',
        'boxby' => 1,
        'typeprice' => $faker-> randomElement(array('1','2')),
        'pricetlist' => 1,
        'codlevel' => $faker-> randomElement(array(1, 2, 3, 4, 5)),
        'levelrangefrom' => $faker->randomFloat(3, 1, 10),
        'levelrangeto'=> $faker->randomFloat(3, 11, 100),
        'PedidoVta' => $faker->randomNumber(4),
        'PedidoPed' => $faker->randomNumber(4),
    ];
});
