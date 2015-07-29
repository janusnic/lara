@extends('layouts.front')
@section('content')
  <div id="main">
    <div class="container">
      <div class="row">
        <!-- Content -->
        <div id="blogcontent" class="8u">
          <section>
            <header>
              <h2>{{ config('contact.title') }}</h2>
                
              </header>
            </section>
            <article>
<div class="row">


<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <div class="alert alert-info">
      {{Session::get('message')}}
    </div>
@endif

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your message')) !!}
</div>
<div class="form-group">
{!! app('captcha')->display(); !!}
</div>
<div class="g-recaptcha" data-sitekey="6LdybwoTAAAAAPFifh3hcN3GTkCR9BrzB0REg6fY"></div>
<div class="form-group">
    {!! Form::submit('Contact Us!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

</div>    
        </article>
      </div>
          <!-- Sidebar -->
          <div id="sidebar" class="4u">
            <section>
              <header>
                <h2>Etiam malesuada</h2>
              </header>
              <div class="row">
                <section class="6u">
                  <ul class="default">
                    <li><a href="#">Donec facilisis tempor</a></li>
                    <li><a href="#">Nulla convallis cursus</a></li>
                    <li><a href="#">Integer congue euismod</a></li>
                    <li><a href="#">Venenatis vulputate</a></li>
                    <li><a href="#">Morbi ligula volutpat</a></li>
                  </ul>
                </section>
                <section class="6u">
                  <ul class="default">
                    <li><a href="#">Donec facilisis tempor</a></li>
                    <li><a href="#">Nulla convallis cursus</a></li>
                    <li><a href="#">Integer congue euismod</a></li>
                    <li><a href="#">Venenatis vulputate</a></li>
                    <li><a href="#">Morbi ligula volutpat</a></li>
                  </ul>
                </section>
              </div>
            </section>
            <section>
              <header>
                <h2>Mauris vulputate</h2>
              </header>
              <ul class="style">
                <li>
                  <p class="posted">May 21, 2014  |  (10 )  Comments</p>
                  <p><a href="#">Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.</a></p>
                </li>
                <li>
                  <p class="posted">May 18, 2014  |  (10 )  Comments</p>
                  <p><a href="#">Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.</a></p>
                </li>
              </ul>
            </section>
          </div>
          
        </div>
      </div>
    </div>
@stop