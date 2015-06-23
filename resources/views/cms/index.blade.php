@extends('layouts.cms')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<section>
						<header>
							<h2>{{ config('blog.title') }}</h2>
			    			<span class="byline"><h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5></span>
    					</header>
    				</section>
    				<div class="row">
					@foreach ($posts as $post)
					    <div class="col-md-6">
						    <p>
							    <a href="{{ route('adm.show', $post->id) }}">{{ $post->title }}</a>
								<em class="posted">({{ $post->published_at->format('M jS Y g:ia') }})</em>
							</p>
					    </div>
					    <div class="col-md-6 text-right">
					    	
					    	<a href="{{ route('adm.index') }}" class="btn btn-info">Back to all tasks</a>
					        <a href="{{ route('adm.edit', $post->id) }}" class="btn btn-primary">Edit</a>
					        {!! Form::open([
					            'method' => 'DELETE',
					            'route' => ['adm.destroy', $post->id]
					        ]) !!}
					            {!! Form::submit('Delete this post?', ['class' => 'btn btn-danger']) !!}
					        {!! Form::close() !!}
					        
					    </div>
					@endforeach
					</div>
					    		    <hr>
    			{!! $posts->render() !!}
			</div>
		</div>
	</div>
</div>
@stop