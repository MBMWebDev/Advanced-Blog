@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home_page')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Category</li>
   </ol>
</nav>
<div class="blog-post">
   <h2>Category title : {{$categories->title}}</h2>
   <p>Related Post(s) :
      @foreach($categories->posts as $post)
   </p>
   <a href="{{route('post.details',[$post->id])}}">{{$post->title}}</a>
   @endforeach
</div>
<hr>
@endsection
