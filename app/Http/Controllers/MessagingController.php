<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\MessagesView;
use App\Models\Listings;
use App\Models\Posts;
use App\Models\User;
use App\Models\Mail\MessageNotificationMail;
use Illuminate\Support\Facades\Mail;
//use App\Models\ForumComments;

class MessagingController extends Controller
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
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $messages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'unread')->get();
        $allmessages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->get();
        $omessages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'read')->get();
        
        
        $data = array(
            'messages' => $messages,
            'omessages' => $omessages,
            'allmessages' => $allmessages,
            'latests' => $latests,
            'posts' => $posts
        );
          
        return view("chat.index", $data);
    }
    public function read()
    {
        //
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
       $omessages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'read')->get();
        
        
        $data = array(
            'omessages' => $omessages,
            'latests' => $latests,
            'posts' => $posts
        );
          
        return view("chat.read", $data);
    }
    public function unread()
    {
        //
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $messages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'unread')->get();
       
        
        $data = array(
            'messages' => $messages,
            'latests' => $latests,
            'posts' => $posts
        );
          
        return view("chat.unread", $data);
    }
    public function indexadmin()
    {
        //
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $messages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'unread')->get();
        $allmessages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->get();
        $omessages = Messages::orderBy('created_at', 'desc')->where('receiver_id', auth()->user()->id)->where('status', 'read')->get();
        
        
        $data = array(
            'messages' => $messages,
            'omessages' => $omessages,
            'allmessages' => $allmessages,
            'latests' => $latests,
            'posts' => $posts
  
        );
          
        return view("chat.indexadmin", $data);
    }


    /**
     * Show the form for creating a new resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listings = Listings::orderBy('created_at', 'desc')->get();
        //$posts = Posts::orderBy('created_at', 'desc')->get();
        return view("chat.create")->with('listings',$listings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
             $data = request()->validate([
                'receiver_name' => 'required|nullable',
                'receiver_email' => 'required',
                'message' => 'required',
                //'sender' => auth()->user()->u_name,
            ]);
            $validatedData['slug'] = Str::slug(auth()->user()->name.auth()->user()->id.time(), '-');
           $message = new Messages;
           $message->receiver_id = $request->input('receiver_id');
           $message->sender_id = auth()->user()->id;
           $message->sender_email = auth()->user()->email;
           $message->slug = $validatedData['slug'];
           $message->message_id = $request->input('message_id');
           $message->sender_name = auth()->user()->name;
           $message->message = $request->input('message');
            //$comment->topic_id = $request->input('topic_id');
            //Save to db
         $message->save();
         
        Mail::to($request->input('receiver_email'))->send(new MessageNotificationMail($data));
         return redirect()->back()->with('success', 'Message sent');
    }
    public function store_reply(Request $request)
    {
        //
        $data = request()->validate([
            'receiver_name' => 'required',
            'receiver_email' => 'required',
            'message' => 'required',
            //'sender' => auth()->user()->u_name,
        ]);
        $validatedData['slug'] = Str::slug(auth()->user()->name.auth()->user()->id.time(), '-');
                     // Create new post
           $message = new Messages;  
           $message->receiver_id = $request->input('receiver_id');
           $message->sender_id = auth()->user()->id;
           $message->sender_email = auth()->user()->email;
           $message->slug = $validatedData['slug'];
           $message->message_id = '0';
           $message->sender_name = auth()->user()->name;
           $message->message = $request->input('message');
            //$comment->topic_id = $request->input('topic_id');
            //Save to db
         $message->save();
         
         Mail::to($receiver->email)->send(new MessageNotificationMail($data));
         return redirect()->back()->with('success', 'Reply sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $chat)
    {
        //
        $messages = Messages::find($chat->id);
        $replies = Messages::find($chat->id);
        //$post = Posts::find($id);
        $data = [
            'messages' => $messages,
            'replies' => $replies
        ];
        //check if message is read and update db appropriately
        MessagesView::createViewLog($messages);
        return view('chat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
