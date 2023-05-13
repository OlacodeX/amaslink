<?php

namespace App\Http\Controllers;

use App\Models\Announcements; 
use App\Models\Listings;
use App\Models\Posts;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcements = Announcements::orderBy('created_at', 'desc')->paginate(4); 
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'announcements' => $announcements,
          'latests' => $latests,
          'posts' => $posts
      );
        return view("pages.announcements", $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
             ]);
             $announcements = new Announcements;
             $announcements->title = $request->input('title');
             $announcements->content = $request->input('content');
             $announcements->user_id = auth()->user()->id;
             $announcements->save();
             return redirect('/superadmin')->with('success', 'Announcement Sent');//I just set the message for session(success).

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $announcements = Announcements::find($id);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'announcements' => $announcements,
          'latests' => $latests,
          'posts' => $posts
      );
        return view('pages.show', $data);
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
        $announcements = Announcements::find($id);
        //check correct user (this will restrict edit access only to the post owner)
        if(auth()->user()->id !== $announcements->user_id){
            return redirect('/announcements')->with('error', 'Unauthorized page.');
        }
        return view('pages.edit')->with('announcements', $announcements);
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
        
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
             ]);
             $announcements = Announcements::find($id);
             $announcements->title = $request->input('title');
             $announcements->content = $request->input('content');
             $announcements->save();
             return redirect('/superadmin')->with('success', 'Announcement Updated');//I just set the message for session(success).

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
        $announcements = Announcements::find($id);


    //check correct user (this will restrict destroy access only to the post owner)
    if(auth()->user()->id !== $announcements->user_id){
     return redirect('/posts')->with('error', 'Unauthorized page.');
    }
    $announcements->delete();

    return redirect('/superadmin')->with('success', 'Announcement Deleted');
    }
}
