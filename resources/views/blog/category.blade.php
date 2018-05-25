@extends('layouts.blog-post')

@section('content')

   @if(count($posts) > 0)

        <h1><strong>{{ $h1category->name }} posts</strong></h1>

        <hr>

        @foreach($posts as $post)

            <h2><a href="{{route('home.post',$post->slug)}}">{{ $post->title }}</a></h2>

            <p class="lead">by <a href="{{route('profile',$post->user->id)}}">{{ $post->user->name }}</a></p>

            <hr>

            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

            <img class="img-responsive"  src="{{$post->photo ? $post->photo->file : '/images/placeholders/blog_placeholder.jpg'}}">

            <hr>

            <p>{{ $post->body }}</p>

            <hr>

        @endforeach

    @else

        <h1>No posts for this category</h1>

    @endif

@endsection