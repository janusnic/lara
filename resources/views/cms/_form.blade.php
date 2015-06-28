<div class="form-group">
    {!! Form::text('title', null, ["class" => "form-control"]) !!}
</div>

<div class="form-group">
     {!! Form::textarea('content', null,
         ['class'=>'form-control', 'placeholder'=>'Content'])
     !!}
</div>

 <div class="form-group">
      {!! Form::input('date', 'published_at', null,
             ['class'=>'form-control'])
      !!}
</div>
 
<div class="form-group">
      {!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
</div>