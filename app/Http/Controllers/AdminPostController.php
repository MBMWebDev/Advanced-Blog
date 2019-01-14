<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use App\User;
use Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories=Category::all();
      $tags=Tag::all();
      $users=User::all();
      $data = Post::with('users')->get();
      return view('admin.posts.manage',compact('categories','tags','users','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
      $tags=Tag::all();
      $data=User::all();
      return view('admin.posts.add',compact('categories','tags','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ( Input::hasFile('image') ) {
        $destination='images/';
        $filename1=$request->image->getClientOriginalName();
      $post=new Post;
      $post->title=$request->title;
      $post->description=$request->description;
      $post->image=$request->image->getClientOriginalName();
      $post->user_id=$request->user_id;
      $post->save();
      Input::file('image')->move($destination,$filename1);
      Session::flash('message', 'Post has been added!');
      $category =$request->category_id;
      $post->categories()->attach($category);
      $tags =$request->tag_id;
      $post->tags()->attach($tags);

      return redirect()->route('admin.posts');
    }
    else{
      return 'try again !';
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post=Post::find($id);
      $tags=Tag::all();
      $categories=Category::all();
      $users=User::all();
      return view('admin.posts.edit',compact('post','tags','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post=Post::find($id);
      if ( Input::hasFile('image') ) {
        $destination='images/';
        $filename1=$request->image->getClientOriginalName();
      $post=new Post;
      $post->title=$request->title;
      $post->description=$request->description;
      $post->image=$request->image->getClientOriginalName();
      $post->user_id=$request->user_id;
      $post->save();
      Input::file('image')->move($destination,$filename1);
      Session::flash('message', 'Category has been added!');
      $category =$request->category_id;
      $post->categories()->attach($category);
      $tags =$request->tag_id;
      $post->tags()->attach($tags);
      Session::flash('message', 'Post has been updated!');
      return redirect()->route('admin.posts');
    }
    else{
      return 'try again !';
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post=Post::where('id',$id)->delete();
      Session::flash('message', 'Post has been deleted!');
      return back();
    }
}
