@extends('admin.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
<br>

<form action="{{ route('tags.update', $tag_info->id) }}" method="POST" name="update_tag">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $tag_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection