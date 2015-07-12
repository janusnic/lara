<?php
trait Sharable {
 
  public function share($item)
  {
    return 'share this item';
  }
 
}

class Post {
 
  use Sharable;
 
}
 
class Comment {
 
  use Sharable;
 
}

$post = new Post;
echo $post->share(''); // 'share this item' 
 
$comment = new Comment;
echo $comment->share(''); // 'share this item'