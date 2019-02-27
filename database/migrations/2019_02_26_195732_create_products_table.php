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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codproduct', 9)->unique();
            $table->string('name', 80);
            $table->decimal('priceone', 8, 2);
            $table->decimal('pricetwo', 8, 2);
            $table->decimal('pricethree', 8, 2);
            $table->integer('pricerangenameone');
            $table->decimal('pricerangefromone', 4, 2);
            $table->decimal('pricerangetoone', 4, 2);
            $table->decimal('pricevaluefromone', 8, 2);
            $table->decimal('pricevaluetoone', 8, 2);
            $table->integer('pricerangenametwo');
            $table->decimal('pricerangefromtwo', 4, 2);
            $table->decimal('pricerangetotwo', 4, 2);
            $table->decimal('pricevaluefromtwo', 8, 2);
            $table->decimal('pricevaluetotwo', 8, 2);
            $table->integer('pricerangenamethree');
            $table->decimal('pricerangefromthree', 4, 2);
            $table->decimal('pricerangetothree', 4, 2);
            $table->decimal('pricevaluefromthree', 8, 2);
            $table->decimal('pricevaluetothree', 8, 2);
            $table->integer('pricerangenamefour');
            $table->decimal('pricerangefromfour', 4, 2);
            $table->decimal('pricerangetofour', 4, 2);
            $table->decimal('pricevaluefromfour', 8, 2);
            $table->decimal('pricevaluetofour', 8, 2);
            $table->integer('pricerangenamefive');
            $table->decimal('pricerangefromfive', 4, 2);
            $table->decimal('pricerangetofive', 4, 2);
            $table->decimal('pricevaluefromfive', 8, 2);
            $table->decimal('pricevaluetofive', 8, 2);
            $table->integer('boxby');
            $table->string('typeunit', 1);
            $table->integer('priceoflist');
            $table->string('flagprice', 1);
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
        Schema::dropIfExists('product');
    }
}
