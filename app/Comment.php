<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    public function posts(){
      return $this->belongsTo(Post::class);
    }
    public function users(){
      return $this->belongsTo(User::class);
    }
}
