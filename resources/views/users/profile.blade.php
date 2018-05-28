@extends('layouts.blog-create')

@section('content')

    <h1>Profile</h1>

    <hr>

    <img height="200px" src="{{ $user->photo ? $user->photo->file : '/images/placeholders/people_placeholder.png' }}">

    <h4><strong>Name:</strong> {{$user->name}}</h4>

    <p><strong>E-mail:</strong> {{$user->email}}</p>
    
    <p><strong>Role:</strong> {{$user->role->name}}</p>

    <p><strong>Status:</strong> 
    
        @if($user->is_active == 1)

            Active

        @else

            Not Active

        @endif
    
    </p>
    
    <p><strong>Published posts:</strong>
        <ul>
            @foreach($user->posts as $post)
                <li><a href="{{route('home.post',$post->slug)}}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </p>
    
    <p><small><strong>Member since {{ $user->created_at->toFormattedDateString() }}</strong></small></p>

    <hr>

@endsection