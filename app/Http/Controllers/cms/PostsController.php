<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostForm;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    /*
    public function index()
    {
        //
        // $posts = Post::where('published_at', '<=', Carbon::now())
        $posts = Post::latest('published_at')->published()
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('cms.index', compact('posts'));
        //return view('cms.index');
    }
    */
    public function index(Post $postModel)
    {
        
        $posts = $postModel->getPublishedPosts();
        return view('cms.index', compact('posts'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $posts = Post::all();
        return view('cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
   /*
    public function store(Request $request)
    {
        //
        $post=$request->all();
        //$post['published_at'] = Carbon::now();
        Post::create($post);
        //Session::flash('flash_message', 'Task successfully added!');
        return redirect('adm/create')->with('message', 'Post saved');
    }
   */
    public function store(PostForm $request)
    {
    $post = new \App\Post;
    //$post=$request->all();
    //print_r($request->all());die;
    $post['title'] = $request['title'];
    $post['published_at'] = $request['published_at'];
    $post['content'] = $request['content'];
    //Post::create($post);
 
    $post->save();
 
    return redirect()->route('adm.create')->with('message', 'Post saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        //return view('cmd.show');
        $post = Post::findOrFail($id);
 
        return view('cms.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('cms.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /*
    public function update($id, Request $request)
    {
        //
        $post = Post::findOrFail($id);
 
        $input = $request->all();
     
        $post->fill($input)->save();
     
        return redirect()->back();
    }
    */

    public function update($id, Request $request)
    {
        //
        $post = Post::findOrFail($id);
 
        $input = $request->all();
     
        $post->fill($input)->save();
     
        return redirect()->route('adm.index')->with('message', 'Post saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
            $post = Post::findOrFail($id);
 
            $post->delete();
           
            return redirect()->route('adm.index');

    }
}
