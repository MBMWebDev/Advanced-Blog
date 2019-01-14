@extends('admin.layouts.app')
@section('content')
<div class="blog-post">
   <h2>Tag title : #{{$tags->title}}</h2>
   <p>Related Post(s) :
      @foreach($tags->posts as $post)
   </p>
   <a href="{{route('post.details',[$post->id])}}">{{$post->title}}</a>
   @endforeach
</div>
<hr>
@endsection
