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
        $articles = Article::all();
        //$articles = Article::orderBy('created_at', 'desc')->take(10)->get();
        //$articles = Article::latest()->get();

        return view('front.index', compact('articles'));
        //return view('front.index');

    }

    public function show($id)
    {

        $articles = Article::find($id);

        return view('front.show')
                    ->with('articles', $articles);

    }

}
