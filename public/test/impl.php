<?php

// Interface
interface Sociable {
 
  public function like();
  public function share($item);
 
}
 
// Trait
trait Sharable {
 
  public function share($item)
  {
    // share this item
    return 'share this item '.$item;
  } 
 
}
 
// Class
class Post implements Sociable {
 
  use Sharable;
 
  public function like()
  {
    //
    echo "I'm like it";
  }
 
}

//$post = new Post;

 
$post = new Post;
 
if($post instanceOf Sociable)
{
  $post->share('hello world');
}

// 'share this item' 
echo $post->share('Hello '); 
$post->like(); 

