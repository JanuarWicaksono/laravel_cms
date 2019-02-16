@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{isset($post->photo) ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{{ $post->body }}</p>

<hr>

<!-- Blog Comments -->

@if (Session::has('comment_message'))
<div class="alert alert-success">
    {{ session('comment_message') }}
</div>
@endif

@if (Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>

    {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}
    <div class="form-group">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        {!! Form::label('body', 'Body :') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>
@endif

<hr>

<!-- Posted Comments -->

<!-- Comment -->
@if (isset($comments))

@foreach ($comments as $comment)

<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{ $comment->photo ? $comment->photo : 'https://via.placeholder.com/50' }}" alt=""
            height="50">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->author }}
            <small>{{ $comment->created_at->diffFOrHumans() }}</small>
        </h4>
        {{ $comment->body }}

        @if (isset($comment->replies))

        @foreach ($comment->replies as $reply)

        @if ($reply->is_active == 1)

        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{ $reply->photo ? $reply->photo : 'https://via.placeholder.com/50' }}"
                    alt="" height="30">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $reply->author }}
                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                </h4>
                {{ $reply->body }}
            </div>
            <div class="comment-reply-container">
                <button class="toggle-reply btn btn-sm btn-primary pull-right">Reply</button>
                <div class="comment-reply">
                    {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <div class="form-group">
                        {!! Form::label('body', 'Body : ') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>

        @endif

        @endforeach

        @endif

    </div>
</div>

@endforeach

@endif

@endsection

@section('scripts')
<script>
    $(".comment-reply-container .toggle-reply").click(function () {
        $(this).next().slideToggle("slow");
    });
</script>
@endsection