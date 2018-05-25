@extends('layouts.admin')

@section('content')

    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table">
        
            <thead>

                <tr>

                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Post</th>
                    <th>Created</th>

                </tr>

            </thead>

            <tbody>

                @foreach($comments as $comment)

                    <tr>

                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ str_limit($comment->body,15) }}</td>
                        <td><a href="{{route('home.post',$comment->post_id)}}">View post</a></td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>

                            @if($comment->is_active == 1)
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    {!! Form::submit('Un-approve',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="1">
                                    {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}

                            @endif

                        </td>
                        <td>

                            {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                @else

                    <h1 class="text-center">No comments</h1>
            
            </tbody>
    
        </table>

    @endif

@endsection