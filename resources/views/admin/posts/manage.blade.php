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
  <form class="form-horizontal" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}
     <fieldset>
        <legend>Add New Post</legend>
        <div class="form-group">
           <label for="inputEmail" class="col-lg-2 control-label">Title</label>
           <div class="col-lg-10">
              <input class="form-control" id="inputEmail" placeholder="Titre" type="text" name="title" required>
           </div>
        </div>
        <div class="form-group">
           <label for="textArea" class="col-lg-2 control-label">Description</label>
           <div class="col-lg-10">
              <textarea class="form-control" rows="3" name="description" required></textarea>
           </div>
        </div>
        <div class="form-group">
           <label for="inputEmail" class="col-lg-2 control-label">Image</label>
           <div class="col-lg-10">
              <input type="file"  name="image"  required>
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-10">
              <label for="sel1">Select User</label>
              <select class="form-control" id="inputCategory" name="user_id" required>
                 @foreach($users as $user)
                 <option value="{{$user->id}}">{{$user->name}}</option>
                 @endforeach
              </select>
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-10">
              <label for="sel1">Add Category: (multiple select)</label>
              <select multiple class="form-control" id="inputCategory" name="category_id[]" required>
                 @foreach($categories as $cat)
                 <option value="{{$cat->id}}">{{$cat->title}}</option>
                 @endforeach
              </select>
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-10">
              <label for="sel1">Add Tags: (multiple select)</label>
              <select multiple class="form-control" id="inputCategory" name="tag_id[]" required>
                 @foreach($tags as $tag)
                 <option value="{{$tag->id}}">{{$tag->title}}</option>
                 @endforeach
              </select>
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-danger">Cancel</button>
           </div>
        </div>
     </fieldset>
  </form>

  <div class="table-responsive table-hover">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $post)
                  <tr>
                    <th scope="row">{{ $post->id}}</th>
                    <td>{{ $post->title}}</td>
                    <td>{{ str_limit($post->description, $limit = 200, $end = '...') }}</td>
                    <td>{{ $post->users->name}}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td><a href="{{route('admin.posts.edit',[$post->id])}}" class="btn btn-primary">Edit</button></td>
                    <td><a onclick="return confirm('are you sure you want to delete this post?')" href="{{route('admin.posts.delete',[$post->id])}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
@endsection
