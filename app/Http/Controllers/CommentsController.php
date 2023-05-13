<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\Models\Forum; 
use App\Models\ForumComments;

class CommentsController extends Controller
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
        //
        
       $this->validate($request, [
        'topic_id' => 'required',
        'comment' => 'required',
         ]);
                 // Create new post
       $comment = new ForumComments;
       $comment->commenter_name = auth()->user()->u_name;
        $comment->commenter_id = auth()->user()->id;;
        $comment->comment = $request->input('comment');
        $comment->topic_id = $request->input('topic_id');
        //Save to db
        $comment->save();
        //print success message and redirect
        return Redirect::back()->with('success', 'Comment Added');
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
        $comments = ForumComments::find($id);
        //check correct user (this will restrict edit access only to the post owner)
        if(auth()->user()->id !== $comments->commenter_id){
            return redirect('/communities')->with('error', 'Unauthorized page.');
        }
        return view('forums.editcomment')->with('comments', $comments);
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
        $this->validate($request, [
            'comment' => 'required',
             ]);
                     // Create new post
           $comment = ForumComments::find($id);
            $comment->comment = $request->input('comment');
            //Save to db
            $comment->save();
            //print success message and redirect
            return redirect('/communities')->with('success', 'Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = ForumComments::find($id);

                //check correct user (this will restrict destroy access only to the post owner)
               // if(auth()->user()->id !==$post->user_id){
                 //   return redirect('/posts')->with('error', 'Unauthorized page.');
                //}
                $comment->delete();
        
                return redirect()->back()->with('success', 'Comment Deleted');
          
   
 
    }
}
