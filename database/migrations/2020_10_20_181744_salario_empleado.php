<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalarioEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('salario_empleado', function (Blueprint $table) {
            $table->increments('id_salario_empleado');
            $table->integer('id_empleado');
            $table->integer('salario');
            $table->integer('impuestos');
            $table->integer('salud'); 
            $table->integer('pension');
            $table->integer('valor_primas');
            $table->integer('id_cargo');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}