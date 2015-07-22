<title>{{ $title or config('blog.title') }}</title>
<meta charset="utf-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
		
<link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('blog.title') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' type='text/css'>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>

<link rel="stylesheet" href='{{ elixir('css/all.css') }}' type='text/css'>
