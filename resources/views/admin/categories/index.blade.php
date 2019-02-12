@extends('layouts.admin')

@section('content')
<h1>Categories</h1>
@if (isset($categories))
<div class="row">
    <div class="col-md-4">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name : ') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('admin.categories.edit', $category->id)}}">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection