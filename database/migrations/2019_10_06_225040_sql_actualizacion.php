<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SqlActualizacion extends Migration
{
    /**
     *En esta migracion realizaremos la actualizacion
     * Manual con SQL si no conocemos el ORM
     */
    public function up()
    {

        $this->down();
        DB::statement('
            CREATE TABLE tabla_sql
            (id int  not null,
             publication text,
             PRIMARY KEY(id))
        
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE IF EXISTS tabla_sql');
    }
}
