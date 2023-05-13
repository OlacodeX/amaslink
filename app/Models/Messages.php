<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
       // Table name
       protected $table = 'messages';
       // primary key
       public $primaryKey = 'id';
       //timestamps
       public $timestamps = true;
       public function getRouteKeyName()
    {
        return 'slug';
    }
      public function post(){
         return $this->hasMany('App\Posts');
     } 
     public function reply(){
         return $this->belongsTo('App\MessagesReply');
     }
}
