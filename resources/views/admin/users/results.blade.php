@extends('layouts.admin')

@section('content')

    @if(count($users) > 0)

        <h1>Search Results</h1>

        <hr>

         <table class="table">
        
        <thead>

            <tr>

                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>
                    <td><img height="30px" src="{{$user->photo ? $user->photo->file : '/images/placeholders/people_placeholder.png'}}"></td>
                    <td><a href="{{route('users.edit',$user->id)}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>

                </tr>

            @endforeach

        </tbody>

    @else

        <h1>No results for your search</h1>

    @endif

@endsection