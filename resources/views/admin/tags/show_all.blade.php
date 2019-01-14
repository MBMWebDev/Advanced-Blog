  @extends('admin.layouts.app')
  @section('content')
  <br>
  <br>
  @if(Session::has('message'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>  {{ Session::get('message') }}</strong>
    </div>
    @endif
  <a href="{{route('admin.tags.create')}}">Add Tag</a>
  <div class="table-responsive table-hover">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $tag)
                    <tr>
                      <th scope="row">{{ $tag->id}}</th>
                      <td>#{{ $tag->title}}</td>
                      <td>{{ $tag->created_at }}</td>
                      <td>{{ $tag->updated_at }}</td>
                      <td><a href="{{route('admin.tags.edit',[$tag->id])}}" class="btn btn-primary">Edit</a></td>
                      <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer cet article?')" href="{{route('admin.tags.destroy',[$tag->id])}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
  @endsection
