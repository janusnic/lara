@extends('layouts.blog')

@section('title', '| View Post')

@section('content')

          <div class="blog-post">

            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ date('M j, Y h:ia', strtotime($article->updated_at)) }} by <a href="#">Janus</a></p>

			<p>{!! $article->content !!}</p>
            <hr>
          </div><!-- /.blog-post -->

@endsection
