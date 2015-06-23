@extends('layouts.cms')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>


                <div class="panel-body">
                    {!! Form::model($post, [
                        'method' => 'PATCH',
                        'route' => ['adm.update', $post->id]
                    ]) !!}
                    
                            <div class="form-group">
                                {!! Form::text('title', null, ["class" => "form-control"]) !!}
                            </div>
 
                            <div class="form-group">
                                {!! Form::textarea('content', null,
                                        ['class'=>'form-control', 'placeholder'=>'Content'])
                                !!}
                            </div>
 
                            <div class="form-group">
                                {!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
                            </div>
 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop