<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    //Funcion para generar la aplicacion de pruebas

    /*
     *
     * para ejecutar los test
     * "vendor/bin/phpunit"
     *
     * */

    public function setUp()
    {
        $this->createApplication();
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    //Funcion que sirve para finalizar la aplicaion de pruebas
    public function tearDown()
    {
       Artisan::call('migrate:reset');
       parent::tearDown();
    }

}
