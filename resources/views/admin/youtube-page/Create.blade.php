@extends('admin.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Static Page</a></h2>
<br>
<form action="{{ route('youtube-pages.store') }}" method="POST" name="add_static_page">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Url</strong>
            <input type="text" name="url" class="form-control" placeholder="Full URL of the webpage">
            <span class="text-danger">{{ $errors->first('url') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Youtube link</strong>
            <input type="text" name="youtube_link" class="form-control" placeholder="Video link on youtube website">
            <span class="text-danger">{{ $errors->first('youtube_link') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection