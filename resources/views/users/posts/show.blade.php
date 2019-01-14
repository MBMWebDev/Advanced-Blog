@extends('layouts.app')
@section('content')

<br>
<br>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('home_page')}}">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Post Manage</li>
</ol>
</nav>
@if(Session::has('message'))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>  {{ Session::get('message') }}</strong>
  </div>
  @endif
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
                    <td></td></a>
                    <td><a href="{{route('user.post.edit',[$post->id])}}" class="btn btn-primary">Edit</button></td>
                    <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer cet article?')" href="{{route('user.post.delete',[$post->id])}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
@endsection
