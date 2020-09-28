@extends('admin.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Youtube Page</a></h2>
<br>

<form action="{{ route('youtube-pages.update', $page->id) }}" method="POST" name="update_youtube_page">
{{ csrf_field() }}
@method('PATCH')

<div class="row">
<div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $page->title }}">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Url</strong>
            <input type="text" name="url" class="form-control" placeholder="Full URL of the webpage" value="{{ $page->url }}">
            <span class="text-danger">{{ $errors->first('url') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Youtube link</strong>
            <input type="text" name="youtube_link" class="form-control" placeholder="Video link on youtube website" value="{{ $page->youtube_link}}">
            <span class="text-danger">{{ $errors->first('youtube_link') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection