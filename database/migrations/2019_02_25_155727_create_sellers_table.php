<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CODEMPRESA', 3)->nullable();
            $table->string('TIPOLOC', 2)->nullable();
            $table->string('CODLOC', 2)->nullable();
            $table->string('CODTIE', 2)->nullable();
            $table->string('CODVEN', 4);
            $table->string('NOMVEN', 50)->nullable();
            $table->string('DIRVEN', 50)->nullable();
            $table->string('LOCVEN', 6)->nullable();
            $table->string('TELE01', 10)->nullable();
            $table->string('TELE02', 10)->nullable();
            $table->string('FECING', 8)->nullable();
            $table->string('SIGLAVEN', 6)->nullable();
            $table->integer('ACTIVO')->default(1);
            $table->integer('COBRADOR')->default(0);
            $table->string('FECINIVIG', 8)->nullable();
            $table->string('FECFINVIG', 8)->nullable();
            $table->bigInteger('IDVENTA');
            $table->string('IMEI', 25);
            $table->timestamps();
            $table->unique(array('CODVEN', 'IMEI'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
