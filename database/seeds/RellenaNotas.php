<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RellenaNotas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 40; $i++) {

            //accedemos a la tabla con la clase DB
            //usamos la funcion insert y le pasamos el arreglo de los datos

            DB::table('notes')->insert(
              [
                  'title' => 'Mi Nota ' . $i,
                  'description'=> 'La descripcion ' .$i
              ]
            );

            //command -> es una funcion que se hereda de la clase Seeder
            $this->command->info('Tabla de notas rellenada correctamente');
        }
    }
}
