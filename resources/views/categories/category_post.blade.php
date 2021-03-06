@extends('layouts.app')
@section('content')
<br>
<br>
<h3>All Categories</h3>
  <div class="row mb-2">
    @foreach($data as $key => $cat)
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <h3 class="mb-0">
              <a class="text-dark" href="{{route('category.show',[$cat->id])}}">{{$cat->title}}</a>
            </h3>
            <div class="col-md-12">
              <p>Related Post(s) :
              @foreach($cat->posts as $post)</p>
              <a href="{{route('post.details',[$post->id])}}">{{$post->title}}</a>
            @endforeach
          </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  <br>
  @endsection
