@extends('layouts.blog-home')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            @if (isset($posts))
            {{-- Posts --}}
            @foreach ($posts as $post)

            <h2>
                <a href="#">{{ $post->title }}</a>
            </h2>
            <p class="lead">
            by <a href="index.php">{{ $post->user->name }}</a>
            </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>
            <hr>
        <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="">
            <hr>
            <p>{!! str_limit($post->body, 100) !!}</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            @endforeach

            @endif

            {{ $posts->render() }}

        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes.front_sidebar')

    </div>
    <!-- /.row -->

    <hr>

    @endsection