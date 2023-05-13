<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bids;
use App\Models\ListingView;
use App\Models\Posts;
use App\Models\Listings;
use App\Models\Favorite;
use App\Models\User;
use Redirect;

class AuctionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
       $this->validate($request, [
        'listing_id' => 'required',
        'bid' => 'required',
         ]);
         $listing_id = $_POST['listing_id'];
         $listing_user = $_POST['listing_user'];
         if ( $listing_user  ==  auth()->user()->id) {
            //print success message and redirect
                return Redirect::back()->with('alert', 'You are not allowed to bid on your own listing.Thanks');
               
         } else {
         
         // Check if user bidded already
         if (empty(Bids::where('bidder_id', auth()->user()->id)->where('listing_id', $listing_id)->first())) {
            // Create new post
           $bid = new Bids;
           $bid->bidder_name = auth()->user()->u_name;
            $bid->bidder_id = auth()->user()->id;;
            $bid->bid = $request->input('bid');
            $bid->listing_id = $request->input('listing_id');
            //Save to db
            $bid->save();
            return Redirect::back()->with('alert', 'Bid Submitted');
         }
         else {
         }
        //print success message and redirect
            return Redirect::back()->with('alert', 'You already bidded on this item, kindy edit your bid or wait for auctioner to decide the winner. Thanks');
           
    }
}

    public function update_bid(Request $request)
    {
        
         $id =$_POST['id'];
         $bid = Bids::find($id);
         $bid->bid = $request->input('bid');
            $bid->save();
        //print success message and redirect
            return Redirect::back()->with('alert', 'Bid Updated!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $listing = Listings::find($id);
        $bids = Bids::orderBy('id', 'desc')->paginate(5);
        $listings = Listings::orderBy('id', 'desc')->paginate(5);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
            'listing' => $listing,
            'listings' => $listings,
            'latests' => $latests,
            'bids' => $bids,
            'posts' => $posts
        );
        
       if($listing->showPost()){
           // this will test if the user viwed the post or not
        return view('listings.showbid')->with($data);
        }

        //$post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
        ListingView::createViewLog($listing);
       // return $post;
       // return view('posts.showpublic')->with('post', $post);
        return view('listings.showbid')->with($data);
          //Rest of method...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // //
        // $bidder_id = $_POST['bidder_id'];
         $bid = Bids::find($id);

         
                 //check correct user (this will restrict destroy access only to the post owner)
               /* if( auth()->user()->id !== $bidder_id){
                    return Redirect::back()->with('alert', 'You don\'t have access.');
                 }*/
                 $bid->delete();
                 return Redirect::back()->with('alert', 'Bid deleted.');
    }
}
