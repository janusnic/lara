<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PostsController extends Controller
{
    protected $post;
 
    public function __construct(Post $post)
      {
          $this->post = $post;
      }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //$posts = $this->post->all();
        //return view('posts.index')->withPost($posts);

        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
      
    }
   
 
    public function showPost($slug)
     {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
     }

}
