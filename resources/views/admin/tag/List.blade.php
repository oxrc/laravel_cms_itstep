@extends('admin.layout')

@section('content')
   <h2 style="margin-top: 12px;" class="text-center">Tags Administration</h2>
   <br>
  <a href="{{ route('tags.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Created At</th>
                 <th colspan="2">Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach($tags as $tag)
              <tr>
                 <td>{{ $tag->id }}</td>
                 <td>{{ $tag->name }}</td>
                 <td>{{ date('Y-m-d', strtotime($tag->created_at)) }}</td>
                 <td><a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('tags.destroy', $tag->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $tags->links() !!}
       </div> 
   </div>
 @endsection 