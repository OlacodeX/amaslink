<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumComments extends Model
{
    //
      // Table name
      protected $table = 'forum_comments';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
     public function topics(){
        return $this->hasMany('App\Forum');
    } 
    public function likes()
{
    return $this->hasMany('App\Likes');
}

    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id', 'id');
    }
}
