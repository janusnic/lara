<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Article;

 class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (views/articles/create.blade.php)
        return view('articles.create');
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title'       => 'required',
			'summary'      => 'required',
			'content' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process
		if ($validator->fails()) {
			return Redirect::to('blog/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$post = new Article;
			$post->title       = Input::get('title');
            $post->slug = str_slug($post->title);
			$post->summary      = Input::get('summary');
			$post->content = Input::get('content');

            $post->seen =  Input::get('seen');
            $post->active = Input::get('active');
            $post->seo_title = Input::get('seo_title');
            $post->seo_key = Input::get('seo_key');
            $post->seo_desc = Input::get('seo_desc');
			$post->save();

			// redirect
			Session::flash('message', 'Successfully created post!');
			return Redirect::to('blog');
		}
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $post = Article::find($id);
        // show the edit form and pass the article
        return view('articles.edit')
                    ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'summary'      => 'required',
            'content' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        // process
        if ($validator->fails()) {
            return Redirect::to('blog/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $post = Article::find($id);;
            $post->title       = Input::get('title');
            $post->slug = str_slug($post->title);
            $post->summary      = Input::get('summary');
            $post->content = Input::get('content');

            $post->seen =  Input::get('seen');
            $post->active = Input::get('active');
            $post->seo_title = Input::get('seo_title');
            $post->seo_key = Input::get('seo_key');
            $post->seo_desc = Input::get('seo_desc');
            $post->save();

            // redirect
            Session::flash('message', 'Successfully updated post!');
            return Redirect::to('blog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $post = Article::find($id);

        return view('articles.show')
                    ->with('post', $post);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $post = Article::find($id);
        $post->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the post!');
        return Redirect::to('blog');
    }

}
