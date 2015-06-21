<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsControllerTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    
    public function testIndex()
    {
       // $this->call('GET', 'posts');

        $response = $this->call('GET', 'posts');
        $response = $this->call('GET', 'PostsController@index');

		$response = $this->call('GET', 'PostsController@index', array('title' => 1));
        //$this->assertViewHas('posts');

        // getData() returns all vars attached to the response.
    //$posts = $response->original->getData()['posts'];
 
    //$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $posts);

    }
    public function testMethod()
	{
	  $this->call('GET', 'posts');

	  $this->assertResponseOk();
	  $this->assertResponseStatus(200);
	  //$this->assertResponseStatus(403);
	  //$this->assertEquals(300, $response->getStatusCode());
	}
}
