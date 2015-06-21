<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostTest extends TestCase 
{
	public function testThatTrueIsTrue()
	{
	  $this->assertTrue(true);
	}

public function testPostSlugIsUnique()
{
  // Create a new Post
  $post = new Post;
  $post->title = "Blog post title".(string)(date(time()));
  $post->content = "Content blog post";
  //$post->slug = "blog-post-title".(string)(date(time()));
   
  $this->assertTrue($post->save());
  // Post should not save
  //$this->assertFalse($post->save());
 
}
}