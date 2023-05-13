<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    //
      // Table name
      protected $table = 'announcements';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
      public function user(){
          return $this->belongsTo('App\User');
      }
}
