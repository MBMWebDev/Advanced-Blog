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
<div class="table-responsive table-hover">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Comment</th>
                    <th>Related post</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $comment)
                  <tr>
                    <th scope="row">{{ $comment->id}}</th>
                    <td>{{ $comment->comment}}</td>
                    <td><a href="{{route('post.details',[$comment->posts->id])}}">{{ $comment->posts->title}}</a></td>
                    <td>{{ $comment->created_at }}</td>
                    <td>{{ $comment->updated_at }}</td>
                    <td></td></a>
                    <td><a href="{{route('user.comment.edit',[$comment->id])}}" class="btn btn-primary">Edit</button></td>
                    <td><a onclick="return confirm('Are you sure you want delete this comment?')" href="{{route('user.comment.delete',[$comment->id])}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
@endsection
