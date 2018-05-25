@extends('layouts.blog-create')

@section('content')

    <h1><strong>Create post</strong></h1>

{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

    <div class="form-group">

        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',[''=>'Choose Categories']+$categories,null,['class'=>'form-control']) !!}

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

        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}

    </div>

{!! Form::close() !!}

@include('layouts.errors')

@endsection