<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;
use App\Comment;

class Post extends Model
{
  public function categories(){
    return $this->belongsToMany(Category::class);
  }

  public function tags(){
    return $this->belongsToMany(Tag::class);
  }

  public function comments(){
    return $this->hasMany(Comment::class,'posts_id','id');
  }
  public function users(){
    return $this->belongsTo(User::class,'user_id');
  }
}
