<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ListingView;

class Listings extends Model
{
     // Table name
     protected $table = 'listings';
     // primary key
     public $primaryKey = 'id';
     //timestamps
     public $timestamps = true;
     public function user(){
         return $this->belongsTo('App\Models\User');
     }

     public function listingView()
      {
          return $this->hasMany(ListingView::class);
      }
      
  
  
      public function bookmarks()
  {
      return $this->hasMany('App\Models\Favorite');
  }
  
  //bids
  public function bid(){
    return $this->belongsTo('App\Models\Bids');
}  
  
public function bids(){
    return $this->hasMany('App\Models\Bids');
}
      public function showPost()
  {
      //if(auth()->user()->id==null){uncomment this for  Listing
          return $this->listingView()
          ->where('ip', '=',  request()->ip())->exists();
     // }
  
      return $this->listingView()
      ->where(function($ListingViewsQuery) { $ListingViewsQuery
          ->where('session_id', '=', request()->getSession()->getId())
          ->orWhere('user_id', '=', (auth()->check()));})->exists();  
  }
  
  
      /**
 * Determine whether a post has been marked as favorite by a user.
 *
 * @return boolean
 */
public function favorited()
{
    return (bool) Favorite::where('user_id', Auth::id())
                        ->where('listing_id', $this->listing_id)
                        ->first();
}

}
