@extends('layouts.blog-post')

@section('content')

    <h1><strong>Search Results</strong></h1>

    <hr>

    @if(count($posts) > 0)

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

    @else

        <h2>No results for search</h2>

    @endif

@endsection