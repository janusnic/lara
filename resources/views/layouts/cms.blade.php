<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('blog.title') }} Admin</title>
<link rel="stylesheet" href='{{ asset('css/bootstrap.min.css') }}'>
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"-->
@yield('styles')
<!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{ config('blog.title') }} Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      @include('layouts.partials.navbar')
    </div>
  </div>
</nav>
 
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
<script
src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src='{{ asset('js/bootstrap.min.js') }}'></script>
 @yield('scripts')
</body>
</html>