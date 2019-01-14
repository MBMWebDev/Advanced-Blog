<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use Session;

class UserCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=Auth::user();
      $data=Comment::where('users_id','=',$user->id)->paginate(10);
      return view('users.comments.show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $user=Auth::user();
      $comment=Comment::find($id);
      if (Gate::forUser($user)->allows('update-comment', $comment)) {
        return view('users.comments.edit',compact('comment'));
         }
     else {
       return view('users.authorization');
    }

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
      $comment=Comment::find($id);
      $comment->comment=$request->comment;
      $comment->save();
      Session::flash('message', 'Comment has been edited!');
      return redirect()->route('user.comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user=Auth::user();
      $comment=Comment::find($id);
      if (Gate::forUser($user)->allows('delete-comment', $comment)) {
        $comment=Comment::where('id',$id)->delete();
        Session::flash('message', 'Post has been deleted!');
        return back();         }
     else {
       return view('users.authorization');
    }
    }
}
