@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('create_post'))

        <p class="bg-danger">{{ session('create_post') }}</p>

    @endif

    @if(Session::has('update_post'))

        <p class="bg-danger">{{ session('update_post') }}</p>

    @endif

    @if(Session::has('delete_post'))

        <p class="bg-danger">{{ session('delete_post') }}</p>

    @endif

     <table class="table">
        
        <thead>

            <tr>

                <th>Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            
            </tr>

        </thead>

        <tbody>

            @if($posts)

                @foreach($posts as $post)

                    <tr>

                        <td>{{ $post->id }}</td>
                        <td><img height="30px" src="{{ $post->photo ? $post->photo->file : '/images/placeholders/blog_placeholder.jpg' }}"></td>
                        <td><a href="{{route('posts.edit',$post->id)}}">{{ $post->user->name }}</a></td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ str_limit($post->body,20) }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td><a href="{{route('home.post',$post->slug)}}">View post</a></td>
                        <td><a href="{{route('comments.show',$post->id)}}">View comments</a></td>

                    </tr>

                @endforeach

            @endif

        </tbody>
    
    </table>

    <div class="row">

        <div class="col-sm-6 col-sm-offset-5">

            {{ $posts->render() }}

        </div>

    </div>

@endsection