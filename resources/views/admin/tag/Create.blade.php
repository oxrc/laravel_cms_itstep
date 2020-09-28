@extends('admin.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Tag</a></h2>
<br>

<form action="{{ route('tags.store') }}" method="POST" name="add_tag">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection