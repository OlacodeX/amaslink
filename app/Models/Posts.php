<?php

namespace App\Models;

use App\Models\PostView;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    
      // Table name
      protected $table = 'posts';
      // primary key
      public $primaryKey = 'id';
      public function getRouteKeyName()
   {
       return 'slug';
   }
      //timestamps
      public $timestamps = true;


      public function user(){
          return $this->belongsTo('App\Models\User');
      }



      public function message(){
          return $this->belongsTo('App\Models\Messages');
      }


   public function postView()
    {
        return $this->hasMany(PostView::class);
    }
    



    public function showPost()
{
    //if(auth()->user()->id==null){uncomment this for  Listing
        return $this->postView()
        ->where('ip', '=',  request()->ip())->exists();
    //}

    return $this->postView()
    ->where(function($postViewsQuery) { $postViewsQuery
        ->where('session_id', '=', request()->getSession()->getId())
        ->orWhere('user_id', '=', (auth()->check()));})->exists();  
}




}
