@extends('layouts.default')
@section('content')
    <h1>Articles</h1>
    @foreach ($articles as $article)

    <article>
      <h2>{{ $article->title }}</h2>
      <div class="body">{{ $article->content }}</div>
    </article>

    @endforeach

@stop
