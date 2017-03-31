@extends('layouts.default')
@section('content')

<h1>Showing {{ $post->title }}</h1>

<div class="jumbotron text-center">
	<h2>{{ $post->title }}</h2>
	<p>
		<strong>Summary:</strong> {{ $post->summary }}<br>
		<strong>Content:</strong> {{ $post->content }}
	</p>
</div>

@stop
