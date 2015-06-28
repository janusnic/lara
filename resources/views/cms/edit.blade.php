@extends('layouts.cms')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('adm.index') }}" class="btn btn-info">Back to all posts</a> | Home | </div>


                <div class="panel-body">
                    {!! Form::model($post, [
                        'method' => 'PATCH',
                        'route' => ['adm.update', $post->id]
                    ]) !!}
                    
                        @include('cms._form')
 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop