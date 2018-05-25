@extends('layouts.admin')

@section('content')

    <h1>Edit post</h1>

    <div class="col-sm-3">

        <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : '/images/placeholders/blog_placeholder.jpg' }}">

    </div>

    <div class="col-sm-9">

        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">

                {!! Form::label('title','Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-3']) !!}

            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete Post',['class'=>'btn btn-danger pull-right col-sm-3']) !!}

            </div>

        {!! Form::close() !!}

    </div>

    @include('layouts.errors')

@endsection