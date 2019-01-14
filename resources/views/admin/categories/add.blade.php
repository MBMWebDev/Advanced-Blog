@extends('admin.layouts.app')
@section('content')
<form class="form-horizontal" action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <fieldset>
      <legend>Add New Category</legend>
      <div class="form-group">
         <label for="inputEmail" class="col-lg-2 control-label">Title</label>
         <div class="col-lg-10">
            <input class="form-control"  placeholder="Titre" type="text" name="title" required>
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
