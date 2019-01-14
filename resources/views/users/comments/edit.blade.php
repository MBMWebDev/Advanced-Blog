@extends('layouts.app')
@section('content')

<form class="form-horizontal" action="{{ route('user.comment.update',[$comment->id]) }}" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <fieldset>
      <legend>Edit Tag</legend>
      <div class="form-group">
         <label for="textArea" class="col-lg-2 control-label">Comment</label>
         <div class="col-lg-10">
           <textarea class="form-control" rows="3" name="comment" required>{{$comment->comment}}</textarea>
         </div>
      </div>
      <input type="hidden" name="user_id" class="form-control" value="{{$comment->users_id}}" />
      <input type="hidden" name="user_id" class="form-control" value="{{$comment->posts_id}}" />

      <div class="form-group">
         <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
         </div>
      </div>
   </fieldset>
</form>
@endsection
