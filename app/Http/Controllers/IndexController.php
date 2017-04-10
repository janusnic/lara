<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Category;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::orderBy('created_at', 'desc')->take(10)->simplePaginate(2);
        //$articles = Article::latest()->get();
        $articles = Article::paginate(2);
        return view('front.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('front.show')
                    ->with('article', $article);
    }


    public function list() {
		$articles = Article::paginate(2);
		return view('front.index')->withArticles($articles);
	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$article = Article::where('slug', '=', $slug)->first();

    	// return the view and pass in the post object
    	return view('front.single')->withArticle($article);
    }
}
