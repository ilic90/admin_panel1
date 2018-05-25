@extends('layouts.blog-create')

@section('content')

    <h1>Edit your profile</h1>

    <hr>

<div class="col-sm-3">

    <img height="200px" src="{{$user->photo ? $user->photo->file : '/images/placeholders/people_placeholder.png'}}" class="img-responsive img-rounded">

</div>

<div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['UsersProfileController@update',$user->id],'files'=>true]) !!}

        <div class="form-group">
        
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
        
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}

        </div>

        

        <div class="form-group">
        
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
        
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}

        </div>

        <div class="form-group">

            {!! Form::submit('Update Profile',['class'=>'btn btn-primary col-sm-3']) !!}

        </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

        <div class="form-group">

            {!! Form::submit('Delete Profile',['class'=>'btn btn-danger pull-right col-sm-3']) !!}

        </div>

    {!! Form::close() !!}

    @include('layouts.errors')

</div>


@endsection