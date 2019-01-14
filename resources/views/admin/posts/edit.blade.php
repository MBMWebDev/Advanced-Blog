@extends('admin.layouts.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-dismissible alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>  {{ Session::get('message') }}</strong>
</div>
@endif
<form class="form-horizontal" action="{{ route('admin.posts.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <fieldset>
      <legend>Add New Post</legend>
      <div class="form-group">
         <label for="inputEmail" class="col-lg-2 control-label">Title</label>
         <div class="col-lg-10">
            <input class="form-control" id="inputEmail" placeholder="Titre" type="text" value="{{ $post->title}}" name="title" required>
         </div>
      </div>
      <div class="form-group">
         <label for="textArea" class="col-lg-2 control-label">Description</label>
         <div class="col-lg-10">
            <textarea class="form-control" rows="3" name="description" required>{{ $post->description}}</textarea>
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
@endsection
