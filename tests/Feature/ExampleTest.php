<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    //palabra al inicio de la funcion test
    public function testSinglePostPageExists(){

         $response = $this->get('/posts/1');
         $response->assertStatus(200);
         $response->assertSee('id');
    }

}
