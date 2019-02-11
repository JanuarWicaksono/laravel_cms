@extends('layouts.admin')

@section('content')

<h1>Posts</h1>
@if ($posts)
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Posts Data
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Owner</th>
                            <th>Category Id</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/50' }}" alt="" height="50"></td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category_id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>
@endif

@endsection