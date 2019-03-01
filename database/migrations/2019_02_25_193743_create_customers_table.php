<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FECING', 8)->nullable();
            $table->string('CODCLI', 8);
            $table->string('NOMBRE', 90)->nullable();
            $table->string('RESPONSA', 90)->nullable();
            $table->string('NOMCLI', 30)->nullable();
            $table->string('APEPAT', 30)->nullable();
            $table->string('APEMAT', 30)->nullable();
            $table->string('FECNAC', 8)->nullable();
            $table->string('CODENTIDAD', 1)->nullable();
            $table->string('DNI', 8)->nullable();
            $table->string('RUC', 11)->nullable();
            $table->string('PASAPORTE', 15)->nullable();
            $table->string('CARNET', 15)->nullable();
            $table->string('CEDULA', 15)->nullable();
            $table->string('DIRCLI', 80)->nullable();
            $table->string('DIS', 80)->nullable();
            $table->string('UBICLI', 6)->nullable();
            $table->string('TELE01', 15)->nullable();
            $table->string('TELE02', 15)->nullable();
            $table->string('CELULAR', 15)->nullable();
            $table->string('EMAIL', 100)->nullable();
            $table->string('CODVEN', 4);
            $table->string('FECUC', 8)->nullable();
            $table->string('FECUP', 8)->nullable();
            $table->string('CREDITO', 2)->nullable();
            $table->string('OBS1', 200)->nullable();
            $table->string('OBS2', 200)->nullable();
            $table->integer('CAUTION')->nullable();
            $table->string('CLASE', 7)->nullable();
            $table->string('RUCLE', 19);
            $table->integer('ACTIVO')->nullable();
            $table->string('ZONA', 2)->nullable();
            $table->string('FECINIVIG', 8)->nullable();
            $table->string('FECFINVIG', 8)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('CODVEN')
                ->references('CODVEN')
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
        Schema::dropIfExists('customers');
    }
}
