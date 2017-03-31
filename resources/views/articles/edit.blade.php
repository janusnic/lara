@extends('layouts.default')
@section('content')

<h1>Edit {{ $post->title}}</h1>

{{ Html::ul($errors->all()) }}

{{ Form::model($post, array('action' => array('ArticlesController@update', $post->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('summary', 'Summary') }}
		{{ Form::text('summary', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('content', 'Content') }}
		{{ Form::textarea('content', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('seen', 'Seen') }}
		{{ Form::checkbox('seen', 1, null,  array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('active', 'Active') }}
		{{ Form::checkbox('active', 1, null,  array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('seo_title', 'Seo Title') }}
		{{ Form::text('seo_title', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('seo_key', 'Seo seo_key') }}
		{{ Form::text('seo_key', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('seo_desc', 'Seo seo_desc') }}
		{{ Form::text('seo_desc', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Update Post!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
