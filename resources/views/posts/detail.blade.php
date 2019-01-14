@extends('layouts.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-dismissible alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>  {{ Session::get('message') }}</strong>
</div>
@endif
<div class="blog-post">
   <figure class="figure">
      <img src="../../images/{{$post->image}}" class="figure-img img-fluid rounded" alt="...">
   </figure>
   <h2>{{$post->title}}</h2>
   <p class="text-muted">{{$post->created_at}}</a></p>
   <p> Categories :
     @foreach($post->categories as $category)
   <a href="{{route('category.show',[$category->id])}}">{{$category->title}}</a>
   @endforeach
 </p>
   <p>{{$post->description}}</p>
   <p> Tags :
     @foreach($post->tags as $tag)
     <a href="{{route('tags.show',[$tag->id])}}"><span class="badge badge-primary">#{{$tag->title}}</span></a>
   @endforeach
 </p></div>
<hr>
<div class="blog-post">
   <h3>Comments</h3>
   @foreach($post->comments as $c)
   <p>{{$c->users->name}}</p>
   <p>{{$c->comment}}</p>
   @if($c->created_at==$c->updated_at)
   <p class="text-muted"> {{$c->created_at->diffForHumans()}}</p>
   @else
   <p class="text-muted"> {{$c->created_at->diffForHumans()}}</p>
   <p class="text-muted">Updatet : {{$c->updated_at->diffForHumans()}}</p>
   @endif

   @endforeach
</div>
<form class="form-horizontal" action="{{ route('comment.store',[$post->id]) }}" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Add Comment</label>
      <div class="col-lg-10">
         <textarea class="form-control" rows="3" name="comment" required></textarea>
      </div>
   </div>
   <input type="hidden" name="posts_id" class="form-control" value="{{$post['id']}}" />
   <input type="hidden" name="user_id" class="form-control" value="{{$data['id']}}" />
   <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
         <button type="submit" class="btn btn-primary">Comment</button>
      </div>
   </div>
</form>
@endsection
