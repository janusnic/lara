@extends('layouts.blog')

@section('content')

      <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        <a href="{{ route('auth.github') }}">Github Login</a>
      </div>

        @foreach ($articles as $key => $value)
          <div class="blog-post">

            <h2 class="blog-post-title">{{ $value->title }}</h2>

            <p class="blog-post-meta">in <a href="{{ URL::to('cats/' . $value->category_id)  }}">{{ $value->category->name }} category</a> {{ date('M j, Y h:ia', strtotime($value->updated_at)) }} by <a href="#">Janus</a></p>

            <p>{{ $value->summary }}</p>
            <hr>
            <a href="{{ route('posts.show', $value->slug) }}" class="btn btn-primary">Read more</a>
          </div><!-- /.blog-post -->
        @endforeach

        <nav>
          <ul class="pager">
              <?php echo $articles->render(); ?>

          </ul>
        </nav>

@endsection
