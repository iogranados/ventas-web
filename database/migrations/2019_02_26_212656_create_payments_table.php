<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CODEMPRESA', 3)->nullable();
            $table->string('TIPOLOC', 2)->nullable();
            $table->string('CODLOC', 2)->nullable();
            $table->bigInteger('OPERACION');
            $table->bigInteger('PEDIDOVTA');
            $table->string('TIPO', 2)->nullable();
            $table->string('CODTIE', 2)->nullable();
            $table->integer('ITEM')->nullable();
            $table->string('TIPODOC', 3)->nullable();
            $table->string('EMISION', 1)->nullable();
            $table->integer('SERIE')->nullable();
            $table->integer('NUMDOC')->nullable();
            $table->string('FECDOC', 8)->nullable();
            $table->string('MONEDA', 7)->nullable();
            $table->decimal('MONTO', 10, 2)->nullable();
            $table->decimal('CAMBIO', 6, 3)->nullable();
            $table->string('ANULADO', 1)->nullable();
            $table->bigInteger('ID_PAYMENT')->unique();
            $table->integer('IDORIGEN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
