<!DOCTYPE HTML>

<html>
	<head>
	
		@include('layouts.partials.head') 

	</head>
	<body class="homepage">

	<!-- Header -->
		@include('layouts.partials.header') 
	
	<!-- Featured -->
	@yield('featured')	
	<!-- Main -->
	@yield('content')
	<!-- Tweet -->

 @include('layouts.partials.tweet')
	<!-- Footer -->

 @include('layouts.partials.footer')
 @include('layouts.partials.scripts') 
	</body>
</html>