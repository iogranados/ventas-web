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

$factory->define(App\Seller::class, function (Faker $faker) {
    return [
        'CODVEN' => $faker->randomNumber(4),
        'NOMVEN' => $faker->name,
        'DIRVEN' => $faker->streetAddress,
        'TELE01' => '991283049',
        'IDVENTA' => $faker->numberBetween(100, 400),
        'IMEI' => Str::random(20),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'CODCLI' => $faker->randomNumber(4),
        'NOMBRE' => $faker->name,
        'RUCLE' => $faker->numberBetween(10000000000, 99999999999),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
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

    ];
});
