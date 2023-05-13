<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    
    protected $fillable = [
        'user_id', 'listing_id', 'title', 'image1','listing_type',
    ];

      // Table name
      protected $table = 'favorites';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
      public function user(){
          return $this->belongsTo('App\User');
      }
  public function bookmarks(){
      return $this->hasMany('App\Listings');
  }
}
