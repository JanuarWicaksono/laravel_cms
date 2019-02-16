@extends('layouts.admin')

@section('content')

<h1>replies</h1>

@if (isset($replies))
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Action</th>
            <th>Approvement</th>
            <th>Deleting</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($replies as $reply)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $reply->author }}</td>
            <td>{{ $reply->email }}</td>
            <td>{{ $reply->body }}</td>
            <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View</a></td>
            <td>
                @if ($reply->is_active == 1)

                {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                <input type="hidden" name="is_active" value="0">
                <div class="form-group">
                    {!! Form::submit('Un-approve', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

                @else

                {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                <input type="hidden" name="is_active" value="1">
                <div class="form-group">
                    {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}
                </div>
                {!! Form::close() !!}

                @endif
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $reply->id]])
                !!}
                <input type="hidden" name="is_active" value="1">
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection