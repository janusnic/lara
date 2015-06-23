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
							<h2>{{ $post->title }}</h2>
			    			<p class="lead">{{ $post->content }}</p>
    					</header>
    				</section>
    				<div class="row">
										    	
					    	<a href="{{ route('adm.index') }}" class="btn btn-info">Back to all tasks</a>
					        <a href="{{ route('adm.edit', $post->id) }}" class="btn btn-primary">Edit</a>
					        {!! Form::open([
					            'method' => 'DELETE',
					            'route' => ['adm.destroy', $post->id]
					        ]) !!}
					            {!! Form::submit('Delete this post?', ['class' => 'btn btn-danger']) !!}
					        {!! Form::close() !!}
					        
					  
					</div>
			</div>
		</div>
	</div>
</div>
@stop