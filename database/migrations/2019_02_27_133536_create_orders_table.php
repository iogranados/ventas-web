<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codsale', 8)->unique();
            $table->string('codorder', 4);
            $table->dateTime('dateorder')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('customer_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->dateTime('datedelivery')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('paymenttype', 3);
            $table->string('receiptType', 3);
            $table->string('imei', 25);
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('semaphore', 3);
            $table->bigInteger('PedidoVta')->nullable();
            $table->bigInteger('PedidoPed')->nullable();
            $table->boolean('statusDownloaded');
            $table->bigInteger('orderInterna')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
