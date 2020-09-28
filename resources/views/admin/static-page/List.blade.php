@extends('admin.layout')

@section('content')
   <h2 style="margin-top: 12px;" class="text-center">Static Pages Administration</h2>
   <br>
  <a href="{{ route('static-pages.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Published</th>
                 <th>Created At</th>
                 <th colspan="2">Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach($pages as $page)
              <tr>
                 <td>{{ $page->id }}</td>
                 <td>{{ $page->title }}</td>
                 <td>
                  @if ($page->published == 1) 
                  Yes
                  @else
                  No
                  @endif
                 </td>
                 <td>{{ date('Y-m-d', strtotime($page->created_at)) }}</td>
                 <td><a href="{{ route('static-pages.edit', $page->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('static-pages.destroy', $page->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $pages->links() !!}
       </div> 
   </div>
 @endsection 