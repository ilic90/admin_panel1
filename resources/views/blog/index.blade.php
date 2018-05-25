@extends('layouts.blog-home')

@section('content')

    <h1 class="page-header">
        <strong>Blog Page</strong>
    </h1>

    @if (count($posts) > 0)

        @foreach($posts as $post)
            
            <h2>
                <a href="{{route('home.post',$post->slug)}}">{{ $post->title }}</a>
            </h2>
            <p class="lead">
                by <a href="{{route('profile',$post->user->id)}}">{{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="{{ $post->photo->file }}" alt="">
            <hr>
            <p>{{ $post->body }}</p>
            

            <hr>

        @endforeach

        <div class="row">

            <div class="col-sm-6 col-sm-offset-5">

                {{ $posts->render() }}

            </div>

        </div>

    @endif

@endsection