@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    @if(Session::has('create_user'))

        <p class="bg-danger">{{ session('create_user') }}</p>

    @endif

    @if(Session::has('update_user'))

        <p class="bg-danger">{{ session('update_user') }}</p>

    @endif

    @if(Session::has('delete_user'))

        <p class="bg-danger">{{ session('delete_user') }}</p>

    @endif

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

            @if($users)

                @foreach($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>
                        <td><img height="30px" src="{{ $user->photo ? $user->photo->file : '/images/placeholders/people_placeholder.png' }}"></td>
                        <td><a href="{{route('users.edit',$user->id)}}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>

                    </tr>

                @endforeach

            @endif

        </tbody>
    
    </table>

@endsection