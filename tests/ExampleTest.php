<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/wel')
             ->see('Laravel 5');

        $response = $this->call('GET', '/hel');

        //$response = $this->call($method, $uri, $parameters, $files, $server, $content);
        $this->assertEquals('Hello world!', $response->getContent());

        $response = $this->call('GET', '/');
 
        $this->assertEquals(200, $response->getStatusCode());
    }

}
