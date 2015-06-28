@extends('layouts.cms')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('adm.index') }}" class="btn btn-info">Back to all posts</a> | Home</div>
 
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif


                <div class="panel-body">
                    {!! Form::open(['route' => 'adm.store']) !!}
 
                            @include('cms._form')
 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop