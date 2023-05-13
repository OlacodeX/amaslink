<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Favorite;
use App\Models\Listings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function index(){
      
        $boosted_paid = Listings::where([
                                      'type' => 'paid',
                                      'status' => 'approved'
                                      ])->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(8);
        $latests = Listings::where([
                                  'type' => 'paid',
                                  'status' => 'approved'
                                  ])->orderBy('created_at', 'desc')->paginate(6);
        $boosted_free = Listings::where([
                                        'type' => 'free',
                                        'status' => 'approved'
                                        ])->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(8);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'boosted_paid' => $boosted_paid,
          'boosted_free' => $boosted_free,
          'latests' => $latests,
          'posts' => $posts,
      );
      
      return view("pages.home", $data);
    }
    
    public function search_result(Request $request)
    {
          $search = $request->input('word');
          $search2 = $request->input('country');
          $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
          
          $listings_all = Listings::orderBy('updated_at', 'desc')->where('title', 'LIKE', '%'. $search. '%')->where('status','approved')->get();
      
          $boosted_paid = Listings::orderBy('updated_at', 'desc')->where('title', 'LIKE', '%'. $search. '%')->where('country', 'LIKE', '%'. $search2. '%')->where('type','paid')->where('status','approved')->where('priority','Yes')->get();
          $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
          $results = Listings::orderBy('created_at', 'desc')->where('title', 'LIKE', '%'. $search. '%')->where('country', 'LIKE', '%'. $search2. '%')->where('type','paid')->where('status','approved')->where('priority','No')->get();
          $boosted_free = Listings::orderBy('updated_at', 'desc')->where('title', 'LIKE', '%'. $search. '%')->where('country', 'LIKE', '%'. $search2. '%')->where('type','free')->where('status','approved')->where('priority','Yes')->get();
          $results_free = Listings::orderBy('created_at', 'desc')->where('title', 'LIKE', '%'. $search. '%')->where('country', 'LIKE', '%'. $search2. '%')->where('type','free')->where('status','approved')->where('priority','No')->get();
          $data = array(
            'results' => $results,
            'latests' => $latests,
            'boosted_paid' => $boosted_paid,
            'boosted_free' => $boosted_free,
            'posts' => $posts,
            'listings_all' => $listings_all,
            'results_free' => $results_free
        );
 
          return view("pages.searchresult")->with($data);
            
    } 
    
    public function category(Request $request)
    {
          $category = $request->input('category');
          $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
          $listings_all = Listings::orderBy('updated_at', 'desc')->where('category', 'LIKE', '%'. $category. '%')->where('status','approved')->get();
          
          $boosted_paid = Listings::orderBy('updated_at', 'desc')->where('category', 'LIKE', '%'. $category. '%')->where('type','paid')->where('status','approved')->where('priority','Yes')->get();
          $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
          $results = Listings::orderBy('created_at', 'desc')->where('category', 'LIKE', '%'. $category. '%')->where('type','paid')->where('status','approved')->where('priority','No')->get();
          $boosted_free = Listings::orderBy('updated_at', 'desc')->where('category', 'LIKE', '%'. $category. '%')->where('type','free')->where('status','approved')->where('priority','Yes')->get();
          $results_free = Listings::orderBy('created_at', 'desc')->where('category', 'LIKE', '%'. $category. '%')->where('status','approved')->where('type','free')->where('priority','No')->get();
          $data = array(
            'results' => $results,
            'latests' => $latests,
            'boosted_paid' => $boosted_paid,
            'boosted_free' => $boosted_free,
            'posts' => $posts,
            'listings_all' => $listings_all,
            'results_free' => $results_free
        );
 
          return view("pages.category_result")->with($data);
            
    } 
    public function listings(){
        $listings_all = Listings::where('status','approved')->orderBy('type', 'desc')->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(40);
        // $boosted_paid = Listings::orderBy('updated_at', 'desc')->where('type','paid')->where('status','approved')->where('priority','Yes')->get();
        // $results = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->where('priority','No')->get();
        $latests = Listings::where([
          'type' => 'paid',
          'status' => 'approved'
          ])->orderBy('created_at', 'desc')->paginate(6);
        // $results_free = Listings::orderBy('created_at', 'desc')->where('type','free')->where('status','approved')->where('priority','No')->get();
        // $boosted_free = Listings::orderBy('updated_at', 'desc')->where('type','free')->where('status','approved')->where('priority','Yes')->get();
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = [
          'latests' => $latests,
          // 'results' => $results,
          // 'boosted_paid' => $boosted_paid,
          // 'boosted_free' => $boosted_free,
          // 'results_free' => $results_free,
          'listings_all' => $listings_all,
          'posts' => $posts
      ];
      
      
        return view("pages.list", $data);
    }
    public function auctions(){
        $listings_all = Listings::where([
          'type' => 'paid/auction',
          'status' => 'approved'
          ])->orderBy('priority', 'desc')->orderBy('updated_at', 'desc')->paginate(40);
        // $boosted_paid = Listings::orderBy('updated_at', 'desc')->where('type','paid/auction')->where('status','approved')->where('priority','Yes')->get();
        // $results = Listings::orderBy('created_at', 'desc')->where('type','paid/auction')->where('status','approved')->where('priority','No')->get();
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          // 'results' => $results,
          // 'boosted_paid' => $boosted_paid,
          'listings_all' => $listings_all,
          'posts' => $posts
      );
      
      
        return view("pages.listuction", $data);
    }
    
    public function favorites(){
        $results = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->where('priority','No')->get();
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $favorites = Favorite::orderBy('created_at', 'desc')->where('user_id',auth()->user()->id)->paginate(4);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $listings = Listings::orderBy('created_at', 'desc')->where('status','approved')->get();
        $data = array(
          'latests' => $latests,
          'results' => $results,
          'favorites' => $favorites,
          'listings' => $listings,
          'posts' => $posts
      );
      
      
        return view("pages.favorite", $data);
    }
    public function listinginner(){
       $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
     
        return view("pages.listinner", $data);
    }
    public function adintro(){
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
        return view("pages.adintro", $data);
    }
    public function auctionintro(){
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
        return view("pages.auctionintro", $data);
    }
    
    public function help(){
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
      
        return view("pages.help", $data);
    }
    public function categories(){
       $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
       $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
        return view("pages.category", $data);
    }
    public function ppolicy(){
        
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
     
        return view("pages.policy", $data);
    }
    public function contact(){
        
       $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
       $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
     // return view("pages.home");
        return view("pages.contact", $data);
    }
    public function ad_packs(){
        
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
      return view("pages.packs", $data);
       
    }
    public function ad_packs_free(){
        
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
      return view("pages.packs_free", $data);
       
    }
    public function auction(){
        
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'latests' => $latests,
          'posts' => $posts
      );
      
      return view("pages.auction", $data);
       
    }
    public function sitemap(){
        return view("pages.map");
    }
}
