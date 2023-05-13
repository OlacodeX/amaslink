<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Payment;
use App\Models\Listings;
use App\Models\Posts;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Mail\NewsletterEmail;
use App\Models\Mail\ListingApprovalMail;
use Illuminate\Support\Facades\Mail;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['emails']]);
        $this->middleware('role:ROLE_SUPERADMIN', ['except' => ['emails']]);
    }
    public function index()
    {
        
        $listings = Listings::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(10);
       
        return view('superadmin')->with('listings', $listings);
    }
    public function users_list()
    {
       // $listings = Listings::orderBy('created_at', 'asc')->paginate(10);
       
        
        $users = User::orderBy('created_at', 'desc')->paginate(100);
       
        return view('users_list')->with('users', $users);
    }
    public function new_users_list()
    {
       // $listings = Listings::orderBy('created_at', 'asc')->paginate(10);
       
        
        $new_users = User::where('created_at', '>=', Carbon::today())->orderBy('created_at', 'desc')->paginate(100);
       
        return view('new_users_list')->with('new_users', $new_users);
    }
    public function all_listings()
    {
       // $listings = Listings::orderBy('created_at', 'asc')->paginate(10);
       
        
        $listings = Listings::orderBy('created_at', 'desc')->paginate(100);
       
        return view('all_listings')->with('listings', $listings);
    }
    public function all_approved()
    {
       // $listings = Listings::orderBy('created_at', 'asc')->paginate(10);
       
        
        $listings = Listings::where('status', 'approved')->orderBy('created_at', 'desc')->paginate(10);
       
        return view('all_approved')->with('listings', $listings);
    }
    public function admin_pending()
    {
       // $listings = Listings::orderBy('created_at', 'asc')->paginate(10);
       
        
        $listings = Listings::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(10);
       
        return view('admin_pending')->with('listings', $listings);
    }
    public function adminpending()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'pending')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('adminpending')->with('listings', $listings);
    }
    public function adminapproved()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('adminapproved')->with('listings', $listings);
    }
    public function adminauctions()
    {
        $listings = Listings::where('user_id', auth()->user()->id)->where('type', 'paid/auction')->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(15);
        //$listing = Listings::where(auth()->user()->id, $listings->user_id)->count();
        return view('adminauction')->with('listings', $listings);
    }
    public function adminposts()
    {
        $posts = Posts::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(6);
        return view('adminposts')->with('posts', $posts);
        
    }   
    public function payments()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(10);
        return view('payments')->with('payments', $payments);
        
    }      
    public function topics()
    {
        $topics = Forum::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(10);
        return view('topic')->with('topics', $topics);
        
    }   
    public function update()
    {
        $id =$_POST['id'];
        $listing = Listings::find($id);
        $listing->status = 'approved';

         $listing->save(); 
         
     //send mail
     $email = $_POST['email'];
     //$title = $listing->title;
     $data = request()->validate([
        'title' => 'required',
    ]);

    //Send mail
       
        Mail::to($email)->send(new ListingApprovalMail($data));
      
         //print success message and redirect
         return redirect('/admin_pending')->with('success', 'Listing Approved.');//I just set the message for session(success).
    
        
    }
    
    public function delete_user()
    {
        // //
        $id = $_POST['id'];
       $user = User::find($id);  
               $user->delete();
       
               return redirect()->back()->with('success', 'User Deleted');
         
    }
    
    public function emails(Request $request)
    {
       
       $this->validate($request, [
        'email' => 'required',
        'name' => 'required'
         ]);
         
        $nl = new Newsletter;
        $nl->name = $request->input('name');
        $nl->email = $request->input('email');
        $nl->save();
        return redirect()->back()->with('alert','Subscription successful');
    }
    public function subscribed_users()
    {
       
        $users = Newsletter::orderBy('created_at', 'desc')->paginate(20);
        return view('newsletterEmails')->with('users', $users); 
    }
    
    public function send_bc(Request $request)
    {
        //
        $data = request()->validate([
            
            'title' => 'required',
            'body' => 'required'
        ]);
        $users = Newsletter::select('email')->pluck('email');
       // foreach ($users as $user) {
            //Send mail
           
            Mail::to($users)->send(new NewsletterEmail($data));
            return redirect('superadmin')->with('success', 'Broadcast Sent');
        //}
    }
}
