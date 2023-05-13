<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UpdateuserController extends Controller
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
        $user = User::find($id);
        $listing = Listings::where('user_id',$user->id)->get('type');
        $data = array(
            'user' => $user,
            'listing' => $listing
        );
        return view('profile.show', $data);
    }
    public function show_free()
    {
        //
        $id=$_POST['id'];
        $user = User::find($id);
        $listing = Listings::where('user_id',$user->id)->get('type');
        $data = array(
            'user' => $user,
            'listing' => $listing
        );
        return view('profile.show_free', $data);
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
        $user = User::find($id);

        return view('profile.edituser')->with('user', $user);
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
            'fb' => 'nullable',
            'twitter' => 'nullable',
            'flickr' => 'nullable',
            'insta' => 'nullable',
            'ytube' => 'nullable',
            'vimeo' => 'nullable',
            'behance' => 'nullable',
            'linkd' => 'nullable',
            'web' => 'nullable',
            'l_name' => 'nullable',
            'f_name' => 'nullable',
            'u_name' => 'nullable',
            'pp' => 'nullable',
            'email' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
        ]);

        //Handle file upload
        if($request->hasFile('pp')){
            //Get file name with the extension
            $filenameWithExt = $request->file('pp')->getClientOriginalName();
            //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           $extension = $request->file('pp')->getClientOriginalExtension();

            // File name to store
           $fileNameTostore = $filename.'_'.time().'.'.$extension;

            // Upload Image
                $path = $request->file('pp')->move('img/cover_images', $fileNameTostore);
        }
    
        $user = User::find($id);
        $user->fb = $request->input('fb');//This will get the user input for title
        $user->twitter = $request->input('twitter');
        $user->flickr = $request->input('flickr');
        $user->insta = $request->input('insta');
        $user->ytube = $request->input('ytube');
        $user->vimeo = $request->input('vimeo');
        $user->behance = $request->input('behance');
        $user->linkd = $request->input('linkd');
        $user->web = $request->input('web');
        $user->l_name = $request->input('l_name');
        $user->u_name = $request->input('u_name');
        $user->email = $request->input('email');
        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->name = $request->input('f_name');
        if($request->hasFile('pp')){
           $user->pp = $fileNameTostore;
       } 
        //Save to db
        $user->save();
        //print success message and redirect
        return redirect('/dashboard')->with('success', 'Profile Updated');//I just set the message for session(success).

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
