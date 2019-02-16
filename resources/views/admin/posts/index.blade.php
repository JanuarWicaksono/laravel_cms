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
                            <th>Action</th>
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
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ route('home.post', $post->id) }}" class="btn btn-sm btn-success">Post</a>
                                <a href="{{ route('admin.comments.show', $post->id) }}" class="btn btn-sm btn-success">Comments</a>
                            </td>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/50' }}" alt="" height="50"></td>
                            <td>{{ $post->category_id ? $post->category->name : 'Uncategorized' }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ str_limit($post->body, 8) }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{ $posts->render() }}
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>
@endif

@endsection