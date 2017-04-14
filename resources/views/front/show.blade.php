@extends('layouts.blog')

@section('title', '| View Post')

@section('content')

          <div class="blog-post">

            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ date('M j, Y h:ia', strtotime($article->updated_at)) }} by <a href="#">Janus</a></p>
            <hr>
			<p>{!! $article->content !!}</p>

            <hr>
            @if($article->tags->count())
                <div class="text-center">
                    <small>Tags: </small>
                    @foreach($article->tags as $tag)
                        {!! link_to('posts/tag?tag=' . $tag->id, $tag->name, ['class' => 'btn btn-default btn-xs']) !!}
                    @endforeach
                </div>
            @endif

          </div><!-- /.blog-post -->

          <div class="row">
              <div class="box">
                  <div class="col-lg-12">
                          <hr>
                          <h3 class="text-center">Comments</h3>
                          <hr>

                          @if($comments->count())
                              @foreach($comments as $comment)
                                  <div class="commentitem">
                                      <h3>
                                          <small>{{ $comment->user->username . ' ' . 'on ' . $comment->created_at }}</small>
                                          @if($user && $user->username == $comment->user->username)
                                              <a id="deletecomment{!! $comment->id !!}" href="#" class="deletecomment"><span class="fa fa-fw fa-trash pull-right" data-toggle="tooltip" data-placement="left" title="delete"></span></a>
                                              <a id="comment{!! $comment->id !!}" href="#" class="editcomment"><span class="fa fa-fw fa-pencil pull-right" data-toggle="tooltip" data-placement="left" title="edit"></span></a>
                                          @endif
                                      </h3>
                                      <div id="content{!! $comment->id !!}">{!! $comment->content !!}</div>
                                      <hr>
                                  </div>
                              @endforeach
                          @endif

                          <div class="row" id="formcreate">
                              @if(session()->has('warning'))
                                  @include('includes/error', ['type' => 'warning', 'message' => session('warning')])
                              @endif
                              @if(session('statut') != 'visitor')
                                  {!! Form::open(['url' => 'comment']) !!}
                                      {!! Form::hidden('article_id', $article->id) !!}
                                      {!! Form::textarea('comments', null,  ['size' => '30x5']) !!}
                                      {!! Form::submit('Send', array('class' => 'col-lg-12')) !!}
                                  {!! Form::close() !!}
                              @else
                                  <div class="text-center"><i class="text-center">Comment info</i></div>
                              @endif
                          </div>
                  </div>
              </div>
          </div>

@endsection
