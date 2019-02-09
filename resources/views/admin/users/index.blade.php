@extends('layouts.admin')

@section('content')

<h1>Users</h1>

@if (isset($users))

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $user->id }}</td>
            <td><img src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/50' }}" alt="" class="img-rounded"
                    height="50"></td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role['name']}}</td>
            <td>{{$user->is_active == 1 ? "Active" : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif


@endsection