@extends('layouts.app')
@section('content')
<br>
<br>
@if(Session::has('message'))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>  {{ Session::get('message') }}</strong>
  </div>
  @endif
<h3>All Posts</h3>
@foreach($data as $key => $post)
<div class="media">
  <img src="../images/{{$post->image}}" width="100px" height="100px" class="align-self-start mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0"><a class="text-dark" href="{{route('post.details',[$post->id])}}">{{$post->title}}</a></h5>
    <p class="text-muted">{{$post->created_at->diffForHumans()}}</p>
    <p> Categories :
      @foreach($post->categories as $category)
    <a href="{{route('category.show',[$category->id])}}">{{$category->title}}</a>
    @endforeach
  </p>
    <p>{{ str_limit($post->description, $limit = 248, $end = '...') }} <a href="{{route('post.details',[$post->id])}}">Continue reading</a></p>
    <p> Tags :
      @foreach($post->tags as $tag)
      <a href="{{route('tags.show',[$tag->id])}}"><span class="badge badge-primary">#{{$tag->title}}</span></a>
    @endforeach
  </p>
  </div>
</div>
<hr>
@endforeach
  <br>
@endsection
