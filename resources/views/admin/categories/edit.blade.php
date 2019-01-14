@extends('admin.layouts.app')
@section('content')
<form class="form-horizontal" action="{{ route('admin.categories.update',[$cat->id]) }}" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <fieldset>
      <legend>Edit Category</legend>
      <div class="form-group">
         <label for="inputEmail" class="col-lg-2 control-label">Title</label>
         <div class="col-lg-10">
            <input class="form-control"  placeholder="Titre" type="text" name="title" value="{{$cat->title}}"required>
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
         </div>
      </div>
   </fieldset>
</form>
@endsection
