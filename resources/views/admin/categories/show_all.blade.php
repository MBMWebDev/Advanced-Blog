@extends('admin.layouts.app')
@section('content')
<br>
<br>
@if(Session::has('message'))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>  {{ Session::get('message') }}</strong>
  </div>
  @endif
<a href="{{route('admin.categories.create')}}">Add a category</a>
<div class="table-responsive table-hover">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $cat)
                  <tr>
                    <th scope="row">{{ $cat->id}}</th>
                    <td>{{ $cat->title}}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>{{ $cat->updated_at }}</td>
                    <td><a href="{{route('admin.categories.edit',[$cat->id])}}" class="btn btn-primary">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete this category?')" href="{{route('admin.categories.delete',[$cat->id])}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
@endsection
