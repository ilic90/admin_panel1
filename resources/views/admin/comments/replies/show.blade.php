@extends('layouts.admin')

@section('content')

    @if(count($replies) > 0)

        <h1>Replies</h1>

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

                @foreach($replies as $reply)

                    <tr>

                        <td>{{ $reply->id }}</td>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ str_limit($reply->body,15) }}</td>
                        <td><a href="{{route('home.post',$reply->comment->post->slug)}}">View post</a></td>
                        <td>{{ $reply->created_at->diffForHumans() }}</td>
                        <td>

                            @if($reply->is_active == 1)
                                {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    {!! Form::submit('Un-approve',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                    <input type="hidden" name="is_active" value="1">
                                    {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                {!! Form::close() !!}

                            @endif

                        </td>
                        <td>

                            {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                @else

                    <h1 class="text-center">No replies</h1>
            
            </tbody>
    
        </table>

    @endif

@endsection