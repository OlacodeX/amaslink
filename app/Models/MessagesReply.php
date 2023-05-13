<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessagesReply extends Model
{
    //
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
    public function messages(){
        return $this->hasMany('App\Messages');
    } 
}
