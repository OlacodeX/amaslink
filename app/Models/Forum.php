<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
      // Table name
      protected $table = 'forums';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
      public function getRouteKeyName()
   {
       return 'slug';
   }
      public function user(){
          return $this->belongsTo('App\User');
      }
      public function comment(){
          return $this->belongsTo('App\ForumComments');
      }  
  
  
}
