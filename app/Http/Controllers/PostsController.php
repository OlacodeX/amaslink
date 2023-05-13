<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Listings;
use App\Models\User;
use Auth;
use App\Models\PostView;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','showPost','bookmark','update']]);
        //$this->middleware('guest', ['except' => ['index', 'show']]);
        $this->middleware('role:ROLE_SUPERADMIN', ['except' => ['index', 'showPost','show','bookmark','update']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $posts = Posts::orderBy('created_at', 'desc')->paginate(4);
       $postss = Posts::orderBy('created_at', 'desc')->get();
       $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
       //$posts = Posts::orderBy('created_at', 'desc')->paginate(2);
      
       $mostRs = Posts::orderBy('id', 'desc')->first();
       $data = array(
        'posts' => $posts,
        'postss' => $postss,
        'latests' => $latests,
        'mostRs' => $mostRs
    );
       return view("Posts.index")->with($data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Posts.create');
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
        'category' => 'required',
        'body' => 'required|max:5000',
         //image means it must be in image format|nullable means the field is optional, then max size is 1999
         'cover_image' => 'image|nullable|max:1999'
         ]);
         $validatedData['slug'] = Str::slug($request->input('title'), '-');
         //Handle file upload
         if($request->hasFile('cover_image')){
             //Get file name with the extension
             $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
             //get just file name
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
 
             // Get just Ext
             $extension = $request->file('cover_image')->getClientOriginalExtension();
 
             // File name to store
             $fileNameTostore = $filename.'_'.time().'.'.$extension;
 
             // Upload Image
             $path = $request->file('cover_image')->move('img/cover_images', $fileNameTostore);
 
         }
         else{
             //default image for post if none was choosed
             $fileNameTostore = 'AMAS.png';
         }
 
     // Create new post
    $post = new Posts;
    $post->title = $request->input('title');//This will get the user input for title
    $post->category = $request->input('category');
    $post->body = $request->input('body');
    $post->slug = $validatedData['slug'];
     //add the user id to post
    $post->user_id = auth()->user()->id;
   // $post->sender_email = auth()->user()->email;
    $post->user_email = auth()->user()->email;
    $post->cover_image = $fileNameTostore;
    //$post->summary = $request->input('summary');
    //$post->file = $fileNameTostorepdf;
     //Save to db
     $post->save();
         

     //print success message and redirect
     return redirect('/adminposts')->with('success', 'Post Created');//I just set the message for session(success).

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $blog)
    {
        //
        $post = Posts::find($blog->id);
        $mostRs = Posts::orderBy('id', 'desc')->paginate(5);
        $data = array(
            'post' => $post,
            'mostRs' => $mostRs
        );
        
       if($post->showPost()){
           // this will test if the user viwed the post or not
        return view('Posts.show')->with($data);
        }

        //$post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
        PostView::createViewLog($post);
       // return $post;
       // return view('posts.showpublic')->with('post', $post);
        return view('Posts.show')->with($data);
          //Rest of method...
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $blog)
    {
        //
        $post = Posts::find($blog->id);
        return view('Posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $blog)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->input('title').$blog->id, '-');
        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           $extension = $request->file('cover_image')->getClientOriginalExtension();

            // File name to store
           $fileNameTostore = $filename.'_'.time().'.'.$extension;

            // Upload Image
                $path = $request->file('cover_image')->move('img/cover_images', $fileNameTostore);
        }
    
        $post = Posts::find($blog->id);
        $post->title = $request->input('title');//This will get the user input for title
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        
        $post->slug = $validatedData['slug'];
        if($request->hasFile('cover_image')){
           $post->cover_image = $fileNameTostore;
       } 
        //Save to db
        $post->save();
        //print success message and redirect
        return redirect('/adminposts')->with('success', 'Post Updated');//I just set the message for session(success).

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $blog)
    {
        // //
       $post = Posts::find($blog->id);

       //if($post->cover_image != 'AMAS.png'){
        //Delete image
       // unlink(public_path('/img/cover_images/'.$post->cover_image));
   // }
       
               //check correct user (this will restrict destroy access only to the post owner)
              // if(auth()->user()->id !==$post->user_id){
                //   return redirect('/posts')->with('error', 'Unauthorized page.');
               //}
               $post->delete();
       
               return redirect('/adminposts')->with('success', 'Post Deleted');
         
    }

}