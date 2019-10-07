<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFrutas extends Migration
{
    /**
     * Esta migracion sirve para hacer cambios sobre la estructura de otra talba
     * cuando ya tenemos datos y necesiamos modificar una tabla
     */
    public function up()
    {
        Schema::table('frutas', function(Blueprint $table){
            //todas son estas modificaciones en la tabla frutas
            $table->string('pais')->after('temporada');
            $table->renameColumn('nombre_fruta','nombre');
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
