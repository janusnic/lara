<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Repositories\BlogRepository;

class CommentController extends Controller
{
    //
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;

        $this->middleware('auth')->only('store', 'destroy');
    }

    public function store(CommentRequest $request, BlogRepository $blogRepository)
    {
        $this->commentRepository->store($request->all(), $request->user()->id);

        $blog = $blogRepository->getById($request->article_id);

        if (!$request->user()->valid) {
            $request->session()->flash('warning', 'blog.warning');
        }

        return back();
    }


}
