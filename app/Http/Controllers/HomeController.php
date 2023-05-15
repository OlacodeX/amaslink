<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use App\Models\Bids;
use App\Models\User;
use App\Mail\BiddingMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('dashboard')->with('listings', $listings);
    }
    public function pending()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'pending')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('user_pending')->with('listings', $listings);
    }
    public function approved()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('user_approved')->with('listings', $listings);
    }
    public function auctions()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('type', 'paid/auction')->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('user_auction')->with('listings', $listings);
    }
    public function all()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('user_a')->with('listings', $listings);
    }
    public function alladmin()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('admin_a')->with('listings', $listings);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = $_GET['id'];
        $listing = Listings::find($id);
        $bids = Bids::orderBy('id', 'desc')->where('listing_id', $id)->paginate(5);
        $data = array(
            'listing' => $listing,
            'bids' => $bids
        );
        return view('showbid')->with($data);
    }
    public function accept_bid()
    {
        $id = $_POST['id'];
        $bidder_id = $_POST['bidder_id'];
        $listing_id = $_POST['listing_id'];
        $bid = Bids::find($id);
        $user = User::find($bidder_id);
        //$listing = Bids::select('status')->where('listing_id',$listing_id)->pluck('status');
        $listing = Bids::orderBy('created_at', 'desc')->where('listing_id',$listing_id)->get('status');
          $bid->status = 'accepted';
                $bid->save();
                //send mail
                
                $data = request()->validate([
                   'bidder_name' => 'required',
                   'listing_title' => 'required',
                   'listing_email' => 'required',
                   'listing_phone' => 'required',
                   //'sender' => auth()->user()->u_name,
               ]);
                Mail::to($user->email)->send(new BiddingMail($data));
    
                return  redirect()->back()->with('success', 'Bid From '.$bid->bidder_name.' Accepted, Kindly wait for the bidder to contact you via email/phone.');
         
            //return  redirect()->back()->with('success', 'You accepted a bid for this item already.');
      
        
    }

}
