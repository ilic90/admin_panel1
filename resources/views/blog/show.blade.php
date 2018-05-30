@extends('layouts.blog-post')

@section('content')

    <h1>{{ $post->title }}</h1>

    <p class="lead">by <a href="{{route('profile',$post->user->id)}}">{{ $post->user->name }}</a></p>

    <hr>

    <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

    <img class="img-responsive"  src="{{$post->photo ? $post->photo->file : '/images/placeholders/blog_placeholder.jpg'}}">

    <hr>

    <p>{{ $post->body }}</p>

    <hr>
    
    @if(Auth::check())

    <div class="well">

        <h4>Leave comment</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Leave Comment',['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

    @endif

    @if(count($comments) > 0)

        @foreach($comments as $comment)

            <div class="media">

                <a class="pull-left" href="#">
                    <img height="64px" class="media-object" src="{{$comment->photo}}">
                </a>

                <div class="media-body">

                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>

                    <p>{{$comment->body}}</p>

                    <!-- Replies -->

                    @if(count($comment->replies) > 0)

                        @foreach($comment->replies as $reply)

                            @if($reply->is_active == 1)

                                <div class="nested-comment media">

                                    <a class="pull-left" href="#">
                                        <img height="64px" class="media-object" src="{{$reply->photo}}">
                                    </a>

                                    <div class="media-body">

                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>

                                        <p>{{$reply->body}}</p>

                                    </div>

                                </div>

                            @endif

                        @endforeach

                    @endif

                    @if(Auth::check())

                    <div class="comment-reply-container">

                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply col-sm-6">

                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                <div class="form-group">
                                    {!! Form::label('body','Body:') !!}
                                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                </div>

                            {!! Form::close() !!}

                        </div>

                    </div>

                    @endif

                </div>

            </div>

        @endforeach

    @endif

@endsection

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");

        });

    </script>

@endsection