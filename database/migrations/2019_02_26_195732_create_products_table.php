<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codproduct', 9)->unique();
            $table->string('name', 80);
            $table->decimal('priceone', 10, 3);
            $table->decimal('pricetwo', 10, 3);
            $table->decimal('pricethree', 10, 3);
            $table->integer('pricerangenameone');
            $table->decimal('pricerangefromone', 6, 2);
            $table->decimal('pricerangetoone', 6, 2);
            $table->decimal('pricevaluefromone', 10, 3);
            $table->decimal('pricevaluetoone', 10, 3);
            $table->integer('pricerangenametwo');
            $table->decimal('pricerangefromtwo', 6, 2);
            $table->decimal('pricerangetotwo', 6, 2);
            $table->decimal('pricevaluefromtwo', 10, 3);
            $table->decimal('pricevaluetotwo', 10, 3);
            $table->integer('pricerangenamethree');
            $table->decimal('pricerangefromthree', 6, 2);
            $table->decimal('pricerangetothree', 6, 2);
            $table->decimal('pricevaluefromthree', 10, 3);
            $table->decimal('pricevaluetothree', 10, 3);
            $table->integer('pricerangenamefour');
            $table->decimal('pricerangefromfour', 6, 2);
            $table->decimal('pricerangetofour', 6, 2);
            $table->decimal('pricevaluefromfour', 10, 3);
            $table->decimal('pricevaluetofour', 10, 3);
            $table->integer('pricerangenamefive');
            $table->decimal('pricerangefromfive', 6, 2);
            $table->decimal('pricerangetofive', 6, 2);
            $table->decimal('pricevaluefromfive', 10, 3);
            $table->decimal('pricevaluetofive', 10, 3);
            $table->integer('boxby');
            $table->string('typeunit', 1);
            $table->integer('priceoflist');
            $table->string('flagprice', 1);
            $table->string('fecIniVig', 8);
            $table->string('fecFinVig', 8);
            $table->string('fecUv', 8);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
