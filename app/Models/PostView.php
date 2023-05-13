<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    
   public function post()
   {
       return $this->belongsTo(Posts::class);
   }
   
    public static function createViewLog($post) {
        $postViews= new PostView();
        //$post = Posts::whereIn($post);
        $postViews->posts_id = $post->id;
        $postViews->url = \Request::url();
        $postViews->titleslug = $post->title;
        $postViews->session_id = \Request::getSession()->getId();
        $postViews->user_id = (\Auth::check())?\Auth::id():null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
        $postViews->ip = \Request::getClientIp();
        $postViews->agent = \Request::header('User-Agent');
        $postViews->save();//please note to save it at lease, very important
    }
    
}
