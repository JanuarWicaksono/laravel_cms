@extends('layouts.admin')

@section('content')

<h1>Media</h1>
@if (isset($photos))
<form action="/delete/media" method="post" class="form-inline">
    {{-- {{ crsf_field() }} --}}
    {{ method_field('delete') }}
    <div class="form-group">
        <select name="checkboxArray" id="" class="form-control">
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="form-control btn-primary">
    </div>
<table class="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>NO</th>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($photos as $photo)
        <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value="{{ $photo->id }}"></td>
            <td>{{ $no++ }}</td>
            <td>{{ $photo->id }}</td>
            <td><img src="{{ $photo->file }}" alt="" height="50"></td>
            <td>{{ $photo->file }}</td>
            <td>{{ $photo->created_at ? $photo->created_at : 'no date' }}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</form>
@endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if (this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }
            });
        });
    </script>
@endsection