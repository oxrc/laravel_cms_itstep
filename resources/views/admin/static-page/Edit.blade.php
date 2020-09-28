@extends('admin.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Static Page</a></h2>
<br>

<form action="{{ route('static-pages.update', $static_page->id) }}" method="POST" name="update_product">
{{ csrf_field() }}
@method('PATCH')

<div class="row">
<div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $static_page->title }}">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Content</strong>
            <textarea name="content" class="form-control" placeholder="Here goes the content of the page..." rows="5">{{ $static_page->content }}</textarea>
            <span class="text-danger">{{ $errors->first('content') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Url</strong>
            <input type="text" name="url" class="form-control" placeholder="Full URL of the webpage" value="{{ $static_page->url }}">
            <span class="text-danger">{{ $errors->first('url') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Published</strong>
            <input type="checkbox" name="published" class="form-control" value="1"
            @if ($static_page->published == 1)
            checked="checked"
            @endif
            >
            <span class="text-danger">{{ $errors->first('published') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection