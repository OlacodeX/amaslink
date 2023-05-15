<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Forum;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\Listings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ForumComments;

class ForumController extends Controller
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
        $topics = Forum::orderBy('created_at', 'desc')->paginate(8);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
          'topics' => $topics,
          'latests' => $latests,
          'posts' => $posts
      );
        
        return view("pages.forum", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("forums.create");
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
            'topic' => 'required',
            //'name' => 'required',
             ]);
             $forum = new Forum;
             $validatedData['slug'] = Str::slug($request->input('topic'), '-');
             $forum->topic = $request->input('topic');
             //$forum->forum_name = $request->input('name');
             $forum->user_id = auth()->user()->id;
             $forum->slug = $validatedData['slug'];
             // $post->sender_email = auth()->user()->email;
             $forum->user_name = auth()->user()->u_name;
             $forum->save();
             return redirect('/superadmin')->with('success', 'Discussion Started');//I just set the message for session(success).

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $community)
    {
        //
        $topics = Forum::find($community->id);
        $mostRs = Posts::orderBy('id', 'desc')->paginate(3);
        $comments =ForumComments::orderBy('id', 'asc')->where('topic_id',$community->id)->paginate(10);
        
        $data = array(
            'topics' => $topics,
            'comments' => $comments,
            'mostRs' => $mostRs
        );
          
       // return view('posts.showpublic')->with('post', $post);
        return view('forums.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $community)
    {
        // 
        $topics = Forum::find($community->id);
        //check correct user (this will restrict edit access only to the post owner)
        if(auth()->user()->id !== $topics->user_id){
            return redirect('/communities')->with('error', 'Unauthorized page.');
        }
        return view('forums.edit')->with('topics', $topics);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $community)
    {
      
        $this->validate($request, [
            
            'topic' => 'required',
             ]);
             $validatedData['slug'] = Str::slug($request->input('topic').$community->id, '-');
                     // Create new post
           $forum = Forum::find($community->id);
            $forum->topic = $request->input('topic');
            $forum->slug = $validatedData['slug'];
            //Save to db
            $forum->save();
            //print success message and redirect
            return redirect('/communities')->with('success', 'Topic Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $community)
    {
        
       $topic = Forum::find($community->id);
       $comments = ForumComments::orderBy('id', 'desc')->where('topic_id', $community->id);

      // if($topic->id == $comments->id){
        //$comments->delete();
    //}
       
               //check correct user (this will restrict destroy access only to the post owner)
              // if(auth()->user()->id !==$post->user_id){
                //   return redirect('/posts')->with('error', 'Unauthorized page.');
               //}
               $topic->delete();
       
               return redirect()->back()->with('success', 'Topic Deleted');
    }


    ////bookmark
        public function like(Request $request) {
            $user_id = Auth::id();
            $comment_id = $request->id;
            $like = User::find($user_id)->likes()->where('user_id', '=', $user_id)->where('comment_id', '=', $comment_id)->first();
    
            if(empty($like)) {
                 $like = Likes::create(array(
                     'user_id' => $user_id,
                     'comment_id' => $request->id,
                 ));
    
            return  redirect()->back()->with('alert', 'Liked!');
            } else {
                 $like->delete();
                 return  redirect()->back()->with('alert', 'Unliked!');
            }   
            return redirect()->back()
                ->with('global', 'We were unable to bookmark the article. Please, try again later.');
        }
}
