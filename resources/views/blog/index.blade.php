@extends('layouts.front')
@section('content')
	<div id="main">
		<div class="container">
			<div class="row">
				<!-- Content -->
				<div id="blogcontent" class="8u">
					<section>
						<header>
							<h2>{{ config('blog.title') }}</h2>
			    			<span class="byline"><h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5></span>
    					</header>
    				</section>
    				<article>
<div class="row">
					<ul class="default">
      				@foreach ($posts as $post)
			        <li><p class="default">
			          <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
			          <em class="posted">({{ $post->published_at->format('M jS Y g:ia') }})</em>
			          
			            {{ str_limit($post->content) }}
			          </p>
			        </li>
			      	@endforeach
    				</ul>
    		    <hr>
    			{!! $posts->render() !!}
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