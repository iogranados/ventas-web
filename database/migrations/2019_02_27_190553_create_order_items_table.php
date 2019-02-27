<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codsale', 8);
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->decimal('quantity', 6, 2);
            $table->decimal('price', 10, 3);
            $table->string('typeunit', 1);
            $table->integer('boxby')->unsigned();
            $table->string('typeprice', 1);
            $table->integer('pricetlist')->unsigned();
            $table->integer('codlevel')->unsigned();
            $table->decimal('levelrangefrom', 10, 3);
            $table->decimal('levelrangeto', 10, 3);
            $table->bigInteger('PedidoVta');
            $table->bigInteger('PedidoPed');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table->foreign('codsale')
                ->references('codsale')
                ->on('orders');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
