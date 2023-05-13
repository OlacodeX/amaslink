<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    
    
    protected $fillable = [
        'user_id', 'comment_id',
    ];

      // Table name
      protected $table = 'likes';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
      public function user(){
          return $this->belongsTo('App\User');
      }
  public function likes(){
      return $this->hasMany('App\ForumComments');
  }
}
