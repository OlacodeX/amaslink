<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Bids;
use App\Models\User;
use App\Models\Posts;
use App\Models\Payment;
use App\Models\Favorite;
use App\Models\Listings;
use Illuminate\Support\Facades\File;
use App\Models\ListingView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ListingNotificationMail;
use Intervention\Image\Facades\Image;
use PragmaRX\Countries\Package\Countries;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('guest', ['except' => ['index', 'show']]);
        //$this->middleware('role:ROLE_SUPERADMIN',['except' => ['show','showPost','create']]);
        
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
        $countries = Countries::all();
        return view('listings.createe',compact('countries'));
    }

    public function createorder(Request $request)
    {
        //
        $countries = Countries::all();
        return view('listings.create',compact('countries'));
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
        'title' => 'required|string|max:50',
        'category' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'address1' => 'required',
        'phone' => 'required|numeric',
        'description' => 'required|max:5000',
         //image means it must be in image format|nullable means the field is optional, then max size is 1999
         'image1' => 'image|nullable|max:1999',
         'subcategory' => 'nullable',
        'c_level' => 'nullable',
        'gender' => 'nullable',
        'payment_method1' => 'nullable',
        'payment_method2' => 'nullable',
        'payment_method3' => 'nullable',
        'payment_method4' => 'nullable',
        'payment_method5' => 'nullable',
        'payment_method6' => 'nullable',
        'price' => 'nullable',
        'condition' => 'nullable|string',
        'purpose' => 'nullable|string',
        'p_type' => 'nullable|string',
        'j_type' => 'nullable|string',
        'bedrooms' => 'nullable',
        'bathrooms' => 'nullable',
        'expire' => 'nullable',
        'area' => 'nullable',
        'p_available' => 'nullable',
        'startd' => 'nullable',
        'endd' => 'nullable',
        'starttime' => 'nullable',
        'endtime' => 'nullable',
        'color' => 'nullable',
        'age' => 'nullable',
        'video' => 'nullable',
        'address2' => 'nullable',
        'info' => 'nullable|string'
         ]);



         //Handle file upload
         if($request->hasFile('image1')){
            //Get file name with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
            //$extension = $request->file('image1')->getClientOriginalExtension();

            $image = $request->file('image1');
            $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

            $watermark = Image::make('img/AMAS.png');
            $destinationPath = public_path('img/cover_images/listings');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
            }
            // File name to store
            $fileNameTostoreone = $img;

            // Upload Imagesave($destinationPath.'/'.$img);
            //$img = Image::make($request->file('image1'));
            //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
            Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
                $constraint->aspectRatio();
            })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
            //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
            //$request->file('image1')
        }
        else{
            //default image for post if none was choosed
            $fileNameTostoreone = 'AMAS.png';
        }
        
           // Create new post
    $listing = new Listings;
    $purpose1 = $_POST['purpose1'];
    $purpose2 = $_POST['purpose2'];
    $purpose3 = $_POST['purpose3'];
    $purpose4 = $_POST['purpose4'];
    $purpose5 = $_POST['purpose5'];
    $purpose6 = $_POST['purpose6'];
    $purpose7 = $_POST['purpose7'];
    $purpose8 = $_POST['purpose8'];
    $purpose9 = $_POST['purpose9'];
    $purpose10 = $_POST['purpose10'];
    $purpose11 = $_POST['purpose11'];
    $purpose12 = $_POST['purpose12'];
    if($purpose1 !== 'N/A'){
        $listing->purpose = $purpose1;
    }  
     if($purpose2 !== 'N/A'){
        $listing->purpose = $purpose2;
    }
    if($purpose3 !== 'N/A'){
        $listing->purpose = $purpose3;
    }
    if($purpose4 !== 'N/A'){
        $listing->purpose = $purpose4;
    }
    if($purpose5 !== 'N/A'){
        $listing->purpose = $purpose5;
    }
    if($purpose6 !== 'N/A'){
        $listing->purpose = $purpose6;
    }
    if($purpose7 !== 'N/A'){
        $listing->purpose = $purpose7;
    }
    if($purpose8 !== 'N/A'){
        $listing->purpose = $purpose8;
    }
    if($purpose9 !== 'N/A'){
        $listing->purpose = $purpose9;
    }
    if($purpose10 !== 'N/A'){
        $listing->purpose = $purpose10;
    }
    if($purpose11 !== 'N/A'){
        $listing->purpose = $purpose11;
    }
    if($purpose12 !== 'N/A'){
        $listing->purpose = $purpose12;
    }
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $price3 = $_POST['price3'];
    $price4 = $_POST['price4'];
    $price5 = $_POST['price5'];
    $price6 = $_POST['price6'];
    $price7 = $_POST['price7'];
    $price8 = $_POST['price8'];
    $price9 = $_POST['price9'];
    $price10 = $_POST['price10'];
    $price11 = $_POST['price11'];
    $price12 = $_POST['price12'];
    $price13 = $_POST['price13'];
    $price14 = $_POST['price14'];
    $price15 = $_POST['price15'];
    if(!empty($price1)){
        $listing->price = $price1;
    }  
     if(!empty($price2)){
        $listing->price = $price2;
    }
    if(!empty($price3)){
        $listing->price = $price3;
    }
    if(!empty($price4)){
        $listing->price = $price4;
    }
    if(!empty($price5)){
        $listing->price = $price5;
    }
    if(!empty($price6)){
        $listing->price = $price6;
    }
    if(!empty($price7)){
        $listing->price = $price7;
    }
    if(!empty($price8)){
        $listing->price = $price8;
    }
    if(!empty($price9)){
        $listing->price = $price9;
    }
    if(!empty($price10)){
        $listing->price = $price10;
    }
    if(!empty($price11)){
        $listing->price = $price11;
    }
    if(!empty($price12)){
        $listing->price = $price12;
    }
    if(!empty($price13)){
        $listing->price = $price13;
    }
    if(!empty($price14)){
        $listing->price = $price14;
    }
    if(!empty($price15)){
        $listing->price = $price15;
    }
   // $condition1 = $_POST['condition1'];
    $condition2 = $_POST['condition2'];
    $condition3 = $_POST['condition3'];
    $condition4 = $_POST['condition4'];
    $condition5 = $_POST['condition5'];
    $condition6 = $_POST['condition6'];
    $condition7 = $_POST['condition7'];
    $condition8 = $_POST['condition8'];
    $condition10 = $_POST['condition10'];
    $condition11 = $_POST['condition11'];
    $condition13 = $_POST['condition13'];
   // if($condition1 !== 'N/A'){
      //  $listing->condition = $condition1;
    //}  
     if($condition2 !== 'N/A'){
        $listing->condition = $condition2;
    }
    if($condition3 !== 'N/A'){
        $listing->condition = $condition3;
    }
    if($condition4 !== 'N/A'){
        $listing->condition = $condition4;
    }
    if($condition5 !== 'N/A'){
        $listing->condition = $condition5;
    }
    if($condition6 !== 'N/A'){
        $listing->condition = $condition6;
    }
    if($condition7 !== 'N/A'){
        $listing->condition = $condition7;
    }
    if($condition8 !== 'N/A'){
        $listing->condition = $condition8;
    }
    if($condition10 !== 'N/A'){
        $listing->condition = $condition10;
    }
    if($condition11 !== 'N/A'){
        $listing->condition = $condition11;
    }
    if($condition13 !== 'N/A'){
        $listing->condition = $condition13;
    }


    $listing->title = $request->input('title');//This will get the user input for title
    $subcategor1 = $_POST['subcategory1'];
    $subcategor2 = $_POST['subcategory2'];
    $subcategor3 = $_POST['subcategory3'];
    $subcategor4 = $_POST['subcategory4'];
    $subcategor5 = $_POST['subcategory5'];
    $subcategor6 = $_POST['subcategory6'];
    $subcategor7 = $_POST['subcategory7'];
    $subcategor8 = $_POST['subcategory8'];
    $subcategor9 = $_POST['subcategory9'];
    $subcategor10 = $_POST['subcategory10'];
    $subcategor11 = $_POST['subcategory11'];
    $subcategor12 = $_POST['subcategory12'];
    $subcategor13 = $_POST['subcategory13'];
    $subcategor14 = $_POST['subcategory14'];
    $subcategor15 = $_POST['subcategory15'];
    $subcategor16 = $_POST['subcategory16'];
    $subcategor17 = $_POST['subcategory17'];
    $subcategor18 = $_POST['subcategory18'];
    $subcategor19 = $_POST['subcategory19'];
    $subcategor20 = $_POST['subcategory20'];
    if($subcategor1 !== 'N/A'){
        $listing->subcategory = $subcategor1;
    }  
     if($subcategor2 !== 'N/A'){
        $listing->subcategory = $subcategor2;
    }
    if($subcategor3 !== 'N/A'){
        $listing->subcategory = $subcategor3;
    }
    if($subcategor4 !== 'N/A'){
        $listing->subcategory = $subcategor4;
    }
    if($subcategor5 !== 'N/A'){
        $listing->subcategory = $subcategor5;
    }
    if($subcategor6 !== 'N/A'){
        $listing->subcategory = $subcategor6;
    }
    if($subcategor7 !== 'N/A'){
        $listing->subcategory = $subcategor7;
    }
    if($subcategor8 !== 'N/A'){
        $listing->subcategory = $subcategor8;
    }
    if($subcategor9 !== 'N/A'){
        $listing->subcategory = $subcategor9;
    }
    if($subcategor10 !== 'N/A'){
        $listing->subcategory = $subcategor10;
    }
    if($subcategor11 !== 'N/A'){
        $listing->subcategory = $subcategor11;
    }
    if($subcategor12 !== 'N/A'){
        $listing->subcategory = $subcategor12;
    }
    if($subcategor13 !== 'N/A'){
        $listing->subcategory = $subcategor13;
    }
    if($subcategor14 !== 'N/A'){
        $listing->subcategory = $subcategor14;
    }
    if($subcategor15 !== 'N/A'){
        $listing->subcategory = $subcategor15;
    }
    if($subcategor16 !== 'N/A'){
        $listing->subcategory = $subcategor16;
    }
    if($subcategor17 !== 'N/A'){
        $listing->subcategory = $subcategor17;
    }
    if($subcategor18 !== 'N/A'){
        $listing->subcategory = $subcategor18;
    }
    if($subcategor19 !== 'N/A'){
        $listing->subcategory = $subcategor19;
    }
    if($subcategor20 !== 'N/A'){
        $listing->subcategory = $subcategor20;
    }

   $listing->category = $request->input('category');
    $listing->description = $request->input('description');
   //This will get the user input for title
    $listing->phone = $request->input('phone');
    $listing->country = $request->input('country');
    $listing->address1 = $request->input('address1');//This will get the user input for title
    $listing->address2 = $request->input('address2');
    $listing->career_level = $request->input('c_level');
    $listing->positions_available = $request->input('p_available');//This will get the user input for title
    $listing->gender = $request->input('gender');
    $listing->payment_method1 = $request->input('payment_method1');
    $listing->payment_method2 = $request->input('payment_method2');
    $listing->payment_method3 = $request->input('payment_method3');
    $listing->payment_method4 = $request->input('payment_method4');
    $listing->payment_method5 = $request->input('payment_method5');
    $listing->payment_method6 = $request->input('payment_method6');
    $listing->type = 'free';
    $listing->property_type = $request->input('p_type');
    $listing->bedrooms = $request->input('bedrooms');//This will get the user input for title
    $listing->bathrooms = $request->input('bathrooms');
    $listing->expire_after = $request->input('expire');
    $listing->land_area = $request->input('area');//This will get the user input for title
    $listing->start_date = $request->input('startd');
    $listing->end_date = $request->input('endd');
    $listing->job_type = $request->input('j_type');
    $listing->start_time = $request->input('starttime');
    $listing->end_time = $request->input('endtime');
    $listing->color = $request->input('color');
    $listing->age = $request->input('age');
    $listing->video = $request->input('video');
    $listing->info = $request->input('info');//This will get the user input for title
    //$listing->status = $request->input('status');
    $listing->priority = 'No';
     //add the user id to post
    $listing->user_id = auth()->user()->id;
    $listing->username = auth()->user()->u_name;
    $listing->user_email = auth()->user()->email;
    $listing->image1 = $fileNameTostoreone;
    //$post->summary = $request->input('summary');
    //$post->file = $fileNameTostorepdf;
     //Save to db
     $listing->save(); 
     
     $data = request()->validate([
        'title' => 'required',
    ]);

    //Send mail
       
        Mail::to('amaslink@gmail.com')->send(new ListingNotificationMail($data));
     //print success message and redirect
     return redirect('/dashboard')->with('success', 'Listing Submitted, kindly wait for our moderators to approve it. Thanks');//I just set the message for session(success).

    }
   
    public function store_paid_auction(Request $request)
    {
        
       $this->validate($request, [
        'title' => 'required|string|max:50',
        'category' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'address1' => 'required',
        'phone' => 'required|numeric',
        'payment_id' => 'required',
        'description' => 'required|max:5000',
         //image means it must be in image format|nullable means the field is optional, then max size is 1999
         'image1' => 'image|nullable|max:1999',
         'subcategory' => 'nullable',
        'c_level' => 'nullable',
        'gender' => 'nullable',
        'payment_method1' => 'nullable',
        'payment_method2' => 'nullable',
        'payment_method3' => 'nullable',
        'payment_method4' => 'nullable',
        'payment_method5' => 'nullable',
        'payment_method6' => 'nullable',
        'price' => 'required',
        'condition' => 'nullable|string',
        'purpose' => 'nullable|string',
        'p_type' => 'nullable|string',
        'bedrooms' => 'nullable',
        'bathrooms' => 'nullable',
        'expire' => 'nullable',
        'area' => 'nullable',
        'p_available' => 'nullable',
        'j_type' => 'nullable|string',
        'startd' => 'nullable',
        'endd' => 'nullable',
        'starttime' => 'nullable',
        'endtime' => 'nullable',
        'color' => 'nullable',
        'age' => 'nullable',
        'image2' => 'image|nullable',
        'image3' => 'image|nullable',
        'image4' => 'image|nullable',
        'image5' => 'image|nullable',
        'video' => 'nullable',
        'address2' => 'nullable',
        'info' => 'nullable'
         ]);



         //Handle file upload
         if($request->hasFile('image1')){
            //Get file name with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           // $extension = $request->file('image1')->getClientOriginalExtension();

            $image = $request->file('image1');
            $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

            $watermark = Image::make('img/AMAS.png');
            
            $destinationPath = public_path('img/cover_images/listings');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
            }
            // File name to store
            $fileNameTostoreone = $img;

            // Upload Imagesave($destinationPath.'/'.$img);
            //$img = Image::make($request->file('image1'));
            //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
            Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
                $constraint->aspectRatio();
            })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
            //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
            //$request->file('image1')
        }
        else{
            //default image for post if none was choosed
            $fileNameTostoreone = 'AMAS.png';
        }
        
        //Handle file upload
        if($request->hasFile('image2')){
           //Get file name with the extension
           $filenameWithExt = $request->file('image2')->getClientOriginalName();
           //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

           // Get just Ext
           //$extension = $request->file('image2')->getClientOriginalExtension();

           $image = $request->file('image2');
           $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

           $watermark = Image::make('img/AMAS.png');
           $destinationPath = public_path('img/cover_images/listings');
           if (!File::isDirectory($destinationPath)) {
               File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
           }
           // File name to store
           $fileNameTostoretwo = $img;

           // Upload Imagesave($destinationPath.'/'.$img);
           //$img = Image::make($request->file('image1'));
           //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
           Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
               $constraint->aspectRatio();
           })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
           //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
           //$request->file('image2')
       }
       else{
           //default image for post if none was choosed
           $fileNameTostoretwo = 'AMAS.png';
       }
       //Handle file upload
       if($request->hasFile('image3')){
          //Get file name with the extension
          $filenameWithExt = $request->file('image3')->getClientOriginalName();
          //get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          // Get just Ext
          //$extension = $request->file('image3')->getClientOriginalExtension();

          $image = $request->file('image3');
          $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

          $watermark = Image::make('img/AMAS.png');
          $destinationPath = public_path('img/cover_images/listings');
          if (!File::isDirectory($destinationPath)) {
              File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
          }
          // File name to store
          $fileNameTostorethree = $img;

          // Upload Imagesave($destinationPath.'/'.$img);
          //$img = Image::make($request->file('image3'));
          //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
          Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
              $constraint->aspectRatio();
          })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
          //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
          //$request->file('image3')
      }
      else{
          //default image for post if none was choosed
          $fileNameTostorethree = 'AMAS.png';
      }
      //Handle file upload
      if($request->hasFile('image4')){
         //Get file name with the extension
         $filenameWithExt = $request->file('image4')->getClientOriginalName();
         //get just file name
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         // Get just Ext
        // $extension = $request->file('image4')->getClientOriginalExtension();

         $image = $request->file('image4');
         $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

         $watermark = Image::make('img/AMAS.png');
         $destinationPath = public_path('img/cover_images/listings');
         if (!File::isDirectory($destinationPath)) {
             File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
         }
         // File name to store
         $fileNameTostorefour = $img;

         // Upload Imagesave($destinationPath.'/'.$img);
         //$img = Image::make($request->file('image1'));
         //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
         Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
             $constraint->aspectRatio();
         })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
         //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
         //$request->file('image4')
     }
     else{
         //default image for post if none was choosed
         $fileNameTostorefour = 'AMAS.png';
     }
     //Handle file upload
     if($request->hasFile('image5')){
        //Get file name with the extension
        $filenameWithExt = $request->file('image5')->getClientOriginalName();
        //get just file name
        //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just Ext
        $extension = $request->file('image5')->getClientOriginalExtension();

        $image = $request->file('image5');
        $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

        $watermark = Image::make('img/AMAS.png');
        $destinationPath = public_path('img/cover_images/listings');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
        }
        // File name to store
        $fileNameTostorefive = $img;

        // Upload Imagesave($destinationPath.'/'.$img);
        //$img = Image::make($request->file('image1'));
        //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
        Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
            $constraint->aspectRatio();
        })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
        //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
        //$request->file('image5')
    }
    else{
        //default image for post if none was choosed
        $fileNameTostorefive = 'AMAS.png';
    }
           // Create new post
    $listing = new Listings;
    $purpose1 = $_POST['purpose1'];
    $purpose2 = $_POST['purpose2'];
    $purpose3 = $_POST['purpose3'];
    $purpose4 = $_POST['purpose4'];
    $purpose5 = $_POST['purpose5'];
    $purpose6 = $_POST['purpose6'];
    $purpose7 = $_POST['purpose7'];
    $purpose8 = $_POST['purpose8'];
    $purpose9 = $_POST['purpose9'];
    $purpose10 = $_POST['purpose10'];
    $purpose11 = $_POST['purpose11'];
    $purpose12 = $_POST['purpose12'];
    if($purpose1 !== 'N/A'){
        $listing->purpose = $purpose1;
    }  
     if($purpose2 !== 'N/A'){
        $listing->purpose = $purpose2;
    }
    if($purpose3 !== 'N/A'){
        $listing->purpose = $purpose3;
    }
    if($purpose4 !== 'N/A'){
        $listing->purpose = $purpose4;
    }
    if($purpose5 !== 'N/A'){
        $listing->purpose = $purpose5;
    }
    if($purpose6 !== 'N/A'){
        $listing->purpose = $purpose6;
    }
    if($purpose7 !== 'N/A'){
        $listing->purpose = $purpose7;
    }
    if($purpose8 !== 'N/A'){
        $listing->purpose = $purpose8;
    }
    if($purpose9 !== 'N/A'){
        $listing->purpose = $purpose9;
    }
    if($purpose10 !== 'N/A'){
        $listing->purpose = $purpose10;
    }
    if($purpose11 !== 'N/A'){
        $listing->purpose = $purpose11;
    }
    if($purpose12 !== 'N/A'){
        $listing->purpose = $purpose12;
    }

        $listing->condition =$request->input('condition');

    $listing->title = $request->input('title');//This will get the user input for title
    $subcategor1 = $_POST['subcategory1'];
    $subcategor2 = $_POST['subcategory2'];
    $subcategor3 = $_POST['subcategory3'];
    $subcategor4 = $_POST['subcategory4'];
    $subcategor5 = $_POST['subcategory5'];
    $subcategor6 = $_POST['subcategory6'];
    $subcategor7 = $_POST['subcategory7'];
    $subcategor8 = $_POST['subcategory8'];
    $subcategor9 = $_POST['subcategory9'];
    $subcategor10 = $_POST['subcategory10'];
    $subcategor11 = $_POST['subcategory11'];
    $subcategor12 = $_POST['subcategory12'];
    $subcategor13 = $_POST['subcategory13'];
    $subcategor14 = $_POST['subcategory14'];
    $subcategor15 = $_POST['subcategory15'];
    $subcategor16 = $_POST['subcategory16'];
    $subcategor17 = $_POST['subcategory17'];
    $subcategor18 = $_POST['subcategory18'];
    $subcategor19 = $_POST['subcategory19'];
    $subcategor20 = $_POST['subcategory20'];
    if($subcategor1 !== 'N/A'){
        $listing->subcategory = $subcategor1;
    }  
     if($subcategor2 !== 'N/A'){
        $listing->subcategory = $subcategor2;
    }
    if($subcategor3 !== 'N/A'){
        $listing->subcategory = $subcategor3;
    }
    if($subcategor4 !== 'N/A'){
        $listing->subcategory = $subcategor4;
    }
    if($subcategor5 !== 'N/A'){
        $listing->subcategory = $subcategor5;
    }
    if($subcategor6 !== 'N/A'){
        $listing->subcategory = $subcategor6;
    }
    if($subcategor7 !== 'N/A'){
        $listing->subcategory = $subcategor7;
    }
    if($subcategor8 !== 'N/A'){
        $listing->subcategory = $subcategor8;
    }
    if($subcategor9 !== 'N/A'){
        $listing->subcategory = $subcategor9;
    }
    if($subcategor10 !== 'N/A'){
        $listing->subcategory = $subcategor10;
    }
    if($subcategor11 !== 'N/A'){
        $listing->subcategory = $subcategor11;
    }
    if($subcategor12 !== 'N/A'){
        $listing->subcategory = $subcategor12;
    }
    if($subcategor13 !== 'N/A'){
        $listing->subcategory = $subcategor13;
    }
    if($subcategor14 !== 'N/A'){
        $listing->subcategory = $subcategor14;
    }
    if($subcategor15 !== 'N/A'){
        $listing->subcategory = $subcategor15;
    }
    if($subcategor16 !== 'N/A'){
        $listing->subcategory = $subcategor16;
    }
    if($subcategor17 !== 'N/A'){
        $listing->subcategory = $subcategor17;
    }
    if($subcategor18 !== 'N/A'){
        $listing->subcategory = $subcategor18;
    }
    if($subcategor19 !== 'N/A'){
        $listing->subcategory = $subcategor19;
    }
    if($subcategor20 !== 'N/A'){
        $listing->subcategory = $subcategor20;
    }

   $listing->category = $request->input('category');
    $listing->description = $request->input('description');
   //This will get the user input for title
    $listing->phone = $request->input('phone');
    $listing->country = $request->input('country');
    $listing->address1 = $request->input('address1');//This will get the user input for title
    $listing->address2 = $request->input('address2');
    $listing->career_level = $request->input('c_level');
    $listing->positions_available = $request->input('p_available');//This will get the user input for title
    $listing->gender = $request->input('gender');
    $listing->price = $request->input('price');
    $listing->payment_method1 = $request->input('payment_method1');
    $listing->payment_method2 = $request->input('payment_method2');
    $listing->payment_method3 = $request->input('payment_method3');
    $listing->payment_method4 = $request->input('payment_method4');
    $listing->payment_method5 = $request->input('payment_method5');
    $listing->payment_method6 = $request->input('payment_method6');
   
    $listing->type = 'paid/auction';
    $listing->property_type = $request->input('p_type');
    $listing->bedrooms = $request->input('bedrooms');//This will get the user input for title
    $listing->bathrooms = $request->input('bathrooms');
    $listing->expire_after = $request->input('expire');
    $listing->land_area = $request->input('area');//This will get the user input for title
    $listing->start_date = $request->input('startd');
    $listing->end_date = $request->input('endd');
    $listing->job_type = $request->input('j_type');
    $listing->start_time = $request->input('starttime');
    $listing->end_time = $request->input('endtime');
    $listing->color = $request->input('color');
    $listing->age = $request->input('age');
    $listing->video = $request->input('video');
    $listing->info = $request->input('info');//This will get the user input for title
    //$listing->status = $request->input('status');
    $listing->priority = $request->input('priority');
     //add the user id to post
    $listing->user_id = auth()->user()->id;
    $listing->username = auth()->user()->u_name;
    $listing->user_email = auth()->user()->email;
    $listing->image1 = $fileNameTostoreone;
    $listing->image2 = $fileNameTostoretwo;
    $listing->image3 = $fileNameTostorethree;
    $listing->image4 = $fileNameTostorefour;
    $listing->image5 = $fileNameTostorefive;
    //$post->summary = $request->input('summary');
    //$post->file = $fileNameTostorepdf;
     //Save to db
     $listing->save(); 
     
     $data = request()->validate([
        'title' => 'required',
    ]);

    //Send mail
       
        Mail::to('amaslink@gmail.com')->send(new ListingNotificationMail($data));
     //print success message and redirect
     return redirect('/dashboard')->with('success', 'Listing Submitted, kindly wait for our moderators to approve it. Thanks');//I just set the message for session(success).

    }
    public function store_paid(Request $request)
    {
        
       $this->validate($request, [
        'title' => 'required',
        'category' => 'required',
        'email' => 'required',
        'country' => 'required',
        'address1' => 'required',
        'phone' => 'required',
        'payment_id' => 'required',
        'description' => 'required|max:5000',
         //image means it must be in image format|nullable means the field is optional, then max size is 1999
         'image1' => 'image|nullable|max:1999',
         'subcategory' => 'nullable',
        'c_level' => 'nullable',
        'gender' => 'nullable',
        'payment_method1' => 'nullable',
        'payment_method2' => 'nullable',
        'payment_method3' => 'nullable',
        'payment_method4' => 'nullable',
        'payment_method5' => 'nullable',
        'payment_method6' => 'nullable',
        'price' => 'nullable',
        'condition' => 'nullable',
        'purpose' => 'nullable',
        'p_type' => 'nullable',
        'bedrooms' => 'nullable',
        'bathrooms' => 'nullable',
        'expire' => 'nullable',
        'area' => 'nullable',
        'p_available' => 'nullable',
        'j_type' => 'nullable',
        'startd' => 'nullable',
        'endd' => 'nullable',
        'starttime' => 'nullable',
        'endtime' => 'nullable',
        'color' => 'nullable',
        'age' => 'nullable',
        'image2' => 'image|nullable',
        'image3' => 'image|nullable',
        'image4' => 'image|nullable',
        'image5' => 'image|nullable',
        'video' => 'nullable',
        'address2' => 'nullable',
        'info' => 'nullable'
         ]);


         //Handle file upload
         if($request->hasFile('image1')){
            //Get file name with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           // $extension = $request->file('image1')->getClientOriginalExtension();

            $image = $request->file('image1');
            $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

            $watermark = Image::make('img/AMAS.png');
            $destinationPath = public_path('img/cover_images/listings');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
            }
            // File name to store
            $fileNameTostoreone = $img;

            // Upload Imagesave($destinationPath.'/'.$img);
            //$img = Image::make($request->file('image1'));
            //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
            Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
                $constraint->aspectRatio();
            })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
            //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
            //$request->file('image1')
        }
        else{
            //default image for post if none was choosed
            $fileNameTostoreone = 'AMAS.png';
        }
        
        //Handle file upload
        if($request->hasFile('image2')){
           //Get file name with the extension
           $filenameWithExt = $request->file('image2')->getClientOriginalName();
           //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

           // Get just Ext
           //$extension = $request->file('image2')->getClientOriginalExtension();

           $image = $request->file('image2');
           $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

           $watermark = Image::make('img/AMAS.png');
           $destinationPath = public_path('img/cover_images/listings');
           if (!File::isDirectory($destinationPath)) {
               File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
           }
           // File name to store
           $fileNameTostoretwo = $img;

           // Upload Imagesave($destinationPath.'/'.$img);
           //$img = Image::make($request->file('image1'));
           //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
           Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
               $constraint->aspectRatio();
           })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
           //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
           //$request->file('image2')
       }
       else{
           //default image for post if none was choosed
           $fileNameTostoretwo = 'AMAS.png';
       }
       //Handle file upload
       if($request->hasFile('image3')){
          //Get file name with the extension
          $filenameWithExt = $request->file('image3')->getClientOriginalName();
          //get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          // Get just Ext
          //$extension = $request->file('image3')->getClientOriginalExtension();

          $image = $request->file('image3');
          $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

          $watermark = Image::make('img/AMAS.png');
          $destinationPath = public_path('img/cover_images/listings');
          if (!File::isDirectory($destinationPath)) {
              File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
          }
          // File name to store
          $fileNameTostorethree = $img;

          // Upload Imagesave($destinationPath.'/'.$img);
          //$img = Image::make($request->file('image3'));
          //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
          Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
              $constraint->aspectRatio();
          })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
          //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
          //$request->file('image3')
      }
      else{
          //default image for post if none was choosed
          $fileNameTostorethree = 'AMAS.png';
      }
      //Handle file upload
      if($request->hasFile('image4')){
         //Get file name with the extension
         $filenameWithExt = $request->file('image4')->getClientOriginalName();
         //get just file name
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         // Get just Ext
        // $extension = $request->file('image4')->getClientOriginalExtension();

         $image = $request->file('image4');
         $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

         $watermark = Image::make('img/AMAS.png');
         $destinationPath = public_path('img/cover_images/listings');
         if (!File::isDirectory($destinationPath)) {
             File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
         }
         // File name to store
         $fileNameTostorefour = $img;

         // Upload Imagesave($destinationPath.'/'.$img);
         //$img = Image::make($request->file('image1'));
         //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
         Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
             $constraint->aspectRatio();
         })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
         //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
         //$request->file('image4')
     }
     else{
         //default image for post if none was choosed
         $fileNameTostorefour = 'AMAS.png';
     }
     //Handle file upload
     if($request->hasFile('image5')){
        //Get file name with the extension
        $filenameWithExt = $request->file('image5')->getClientOriginalName();
        //get just file name
        //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just Ext
        $extension = $request->file('image5')->getClientOriginalExtension();

        $image = $request->file('image5');
        $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

        $watermark = Image::make('img/AMAS.png');
        $destinationPath = public_path('img/cover_images/listings');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
        }
        // File name to store
        $fileNameTostorefive = $img;

        // Upload Imagesave($destinationPath.'/'.$img);
        //$img = Image::make($request->file('image1'));
        //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
        Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
            $constraint->aspectRatio();
        })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
        //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
        //$request->file('image5')
    }
    else{
        //default image for post if none was choosed
        $fileNameTostorefive = 'AMAS.png';
    }
     
           // Create new post
    $listing = new Listings;
    $purpose1 = $_POST['purpose1'];
    $purpose2 = $_POST['purpose2'];
    $purpose3 = $_POST['purpose3'];
    $purpose4 = $_POST['purpose4'];
    $purpose5 = $_POST['purpose5'];
    $purpose6 = $_POST['purpose6'];
    $purpose7 = $_POST['purpose7'];
    $purpose8 = $_POST['purpose8'];
    $purpose9 = $_POST['purpose9'];
    $purpose10 = $_POST['purpose10'];
    $purpose11 = $_POST['purpose11'];
    $purpose12 = $_POST['purpose12'];
    if($purpose1 !== 'N/A'){
        $listing->purpose = $purpose1;
    }  
     if($purpose2 !== 'N/A'){
        $listing->purpose = $purpose2;
    }
    if($purpose3 !== 'N/A'){
        $listing->purpose = $purpose3;
    }
    if($purpose4 !== 'N/A'){
        $listing->purpose = $purpose4;
    }
    if($purpose5 !== 'N/A'){
        $listing->purpose = $purpose5;
    }
    if($purpose6 !== 'N/A'){
        $listing->purpose = $purpose6;
    }
    if($purpose7 !== 'N/A'){
        $listing->purpose = $purpose7;
    }
    if($purpose8 !== 'N/A'){
        $listing->purpose = $purpose8;
    }
    if($purpose9 !== 'N/A'){
        $listing->purpose = $purpose9;
    }
    if($purpose10 !== 'N/A'){
        $listing->purpose = $purpose10;
    }
    if($purpose11 !== 'N/A'){
        $listing->purpose = $purpose11;
    }
    if($purpose12 !== 'N/A'){
        $listing->purpose = $purpose12;
    }
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $price3 = $_POST['price3'];
    $price4 = $_POST['price4'];
    $price5 = $_POST['price5'];
    $price6 = $_POST['price6'];
    $price7 = $_POST['price7'];
    $price8 = $_POST['price8'];
    $price9 = $_POST['price9'];
    $price10 = $_POST['price10'];
    $price11 = $_POST['price11'];
    $price12 = $_POST['price12'];
    $price13 = $_POST['price13'];
    $price14 = $_POST['price14'];
    $price15 = $_POST['price15'];
    if(!empty($price1)){
        $listing->price = $price1;
    }  
     if(!empty($price2)){
        $listing->price = $price2;
    }
    if(!empty($price3)){
        $listing->price = $price3;
    }
    if(!empty($price4)){
        $listing->price = $price4;
    }
    if(!empty($price5)){
        $listing->price = $price5;
    }
    if(!empty($price6)){
        $listing->price = $price6;
    }
    if(!empty($price7)){
        $listing->price = $price7;
    }
    if(!empty($price8)){
        $listing->price = $price8;
    }
    if(!empty($price9)){
        $listing->price = $price9;
    }
    if(!empty($price10)){
        $listing->price = $price10;
    }
    if(!empty($price11)){
        $listing->price = $price11;
    }
    if(!empty($price12)){
        $listing->price = $price12;
    }
    if(!empty($price13)){
        $listing->price = $price13;
    }
    if(!empty($price14)){
        $listing->price = $price14;
    }
    if(!empty($price15)){
        $listing->price = $price15;
    }
   // $condition1 = $_POST['condition1'];
    $condition2 = $_POST['condition2'];
    $condition3 = $_POST['condition3'];
    $condition4 = $_POST['condition4'];
    $condition5 = $_POST['condition5'];
    $condition6 = $_POST['condition6'];
    $condition7 = $_POST['condition7'];
    $condition8 = $_POST['condition8'];
    $condition10 = $_POST['condition10'];
    $condition11 = $_POST['condition11'];
    $condition12 = $_POST['condition12'];
    $condition13 = $_POST['condition13'];
   // if($condition1 !== 'N/A'){
      //  $listing->condition = $condition1;
    //}  
     if($condition2 !== 'N/A'){
        $listing->condition = $condition2;
    }
    if($condition3 !== 'N/A'){
        $listing->condition = $condition3;
    }
    if($condition4 !== 'N/A'){
        $listing->condition = $condition4;
    }
    if($condition5 !== 'N/A'){
        $listing->condition = $condition5;
    }
    if($condition6 !== 'N/A'){
        $listing->condition = $condition6;
    }
    if($condition7 !== 'N/A'){
        $listing->condition = $condition7;
    }
    if($condition8 !== 'N/A'){
        $listing->condition = $condition8;
    }
    if($condition10 !== 'N/A'){
        $listing->condition = $condition10;
    }
    if($condition11 !== 'N/A'){
        $listing->condition = $condition11;
    }
    if($condition12 !== 'N/A'){
        $listing->condition = $condition12;
    }
    if($condition13 !== 'N/A'){
        $listing->condition = $condition13;
    }



    $listing->title = $request->input('title');//This will get the user input for title
    $subcategor1 = $_POST['subcategory1'];
    $subcategor2 = $_POST['subcategory2'];
    $subcategor3 = $_POST['subcategory3'];
    $subcategor4 = $_POST['subcategory4'];
    $subcategor5 = $_POST['subcategory5'];
    $subcategor6 = $_POST['subcategory6'];
    $subcategor7 = $_POST['subcategory7'];
    $subcategor8 = $_POST['subcategory8'];
    $subcategor9 = $_POST['subcategory9'];
    $subcategor10 = $_POST['subcategory10'];
    $subcategor11 = $_POST['subcategory11'];
    $subcategor12 = $_POST['subcategory12'];
    $subcategor13 = $_POST['subcategory13'];
    $subcategor14 = $_POST['subcategory14'];
    $subcategor15 = $_POST['subcategory15'];
    $subcategor16 = $_POST['subcategory16'];
    $subcategor17 = $_POST['subcategory17'];
    $subcategor18 = $_POST['subcategory18'];
    $subcategor19 = $_POST['subcategory19'];
    $subcategor20 = $_POST['subcategory20'];
    if($subcategor1 !== 'N/A'){
        $listing->subcategory = $subcategor1;
    }  
     if($subcategor2 !== 'N/A'){
        $listing->subcategory = $subcategor2;
    }
    if($subcategor3 !== 'N/A'){
        $listing->subcategory = $subcategor3;
    }
    if($subcategor4 !== 'N/A'){
        $listing->subcategory = $subcategor4;
    }
    if($subcategor5 !== 'N/A'){
        $listing->subcategory = $subcategor5;
    }
    if($subcategor6 !== 'N/A'){
        $listing->subcategory = $subcategor6;
    }
    if($subcategor7 !== 'N/A'){
        $listing->subcategory = $subcategor7;
    }
    if($subcategor8 !== 'N/A'){
        $listing->subcategory = $subcategor8;
    }
    if($subcategor9 !== 'N/A'){
        $listing->subcategory = $subcategor9;
    }
    if($subcategor10 !== 'N/A'){
        $listing->subcategory = $subcategor10;
    }
    if($subcategor11 !== 'N/A'){
        $listing->subcategory = $subcategor11;
    }
    if($subcategor12 !== 'N/A'){
        $listing->subcategory = $subcategor12;
    }
    if($subcategor13 !== 'N/A'){
        $listing->subcategory = $subcategor13;
    }
    if($subcategor14 !== 'N/A'){
        $listing->subcategory = $subcategor14;
    }
    if($subcategor15 !== 'N/A'){
        $listing->subcategory = $subcategor15;
    }
    if($subcategor16 !== 'N/A'){
        $listing->subcategory = $subcategor16;
    }
    if($subcategor17 !== 'N/A'){
        $listing->subcategory = $subcategor17;
    }
    if($subcategor18 !== 'N/A'){
        $listing->subcategory = $subcategor18;
    }
    if($subcategor19 !== 'N/A'){
        $listing->subcategory = $subcategor19;
    }
    if($subcategor20 !== 'N/A'){
        $listing->subcategory = $subcategor20;
    }

   $listing->category = $request->input('category');
    $listing->description = $request->input('description');
   //This will get the user input for title
    $listing->phone = $request->input('phone');
    $listing->country = $request->input('country');
    $listing->address1 = $request->input('address1');//This will get the user input for title
    $listing->address2 = $request->input('address2');
    $listing->career_level = $request->input('c_level');
    $listing->positions_available = $request->input('p_available');//This will get the user input for title
    $listing->gender = $request->input('gender');
    $listing->payment_method1 = $request->input('payment_method1');
    $listing->payment_method2 = $request->input('payment_method2');
    $listing->payment_method3 = $request->input('payment_method3');
    $listing->payment_method4 = $request->input('payment_method4');
    $listing->payment_method5 = $request->input('payment_method5');
    $listing->payment_method6 = $request->input('payment_method6');
   
    $listing->type = 'paid';
    $listing->property_type = $request->input('p_type');
    $listing->bedrooms = $request->input('bedrooms');//This will get the user input for title
    $listing->bathrooms = $request->input('bathrooms');
    $listing->expire_after = $request->input('expire');
    $listing->land_area = $request->input('area');//This will get the user input for title
    $listing->start_date = $request->input('startd');
    $listing->end_date = $request->input('endd');
    $listing->job_type = $request->input('j_type');
    $listing->start_time = $request->input('starttime');
    $listing->end_time = $request->input('endtime');
    $listing->color = $request->input('color');
    $listing->age = $request->input('age');
    $listing->video = $request->input('video');
    $listing->info = $request->input('info');//This will get the user input for title
    //$listing->status = $request->input('status');
    $listing->priority = $request->input('priority');
     //add the user id to post
    $listing->user_id = auth()->user()->id;
    $listing->username = auth()->user()->u_name;
    $listing->user_email = auth()->user()->email;
    $listing->image1 = $fileNameTostoreone;
    $listing->image2 = $fileNameTostoretwo;
    $listing->image3 = $fileNameTostorethree;
    $listing->image4 = $fileNameTostorefour;
    $listing->image5 = $fileNameTostorefive;
    //$post->summary = $request->input('summary');
    //$post->file = $fileNameTostorepdf;
     //Save to db
     $listing->save(); 
     
     $data = request()->validate([
        'title' => 'required',
    ]);

    //Send mail
       
        Mail::to('amaslink@gmail.com')->send(new ListingNotificationMail($data));
     //print success message and redirect
     return redirect('/dashboard')->with('success', 'Listing Submitted, kindly wait for our moderators to approve it. Thanks');//I just set the message for session(success).

    }
    public function store_paid_free(Request $request)
    {
        
       $this->validate($request, [
        'title' => 'required',
        'category' => 'required',
        'email' => 'required',
        'country' => 'required',
        'address1' => 'required',
        'phone' => 'required',
        'payment_id' => 'required',
        'description' => 'required|max:5000',
         //image means it must be in image format|nullable means the field is optional, then max size is 1999
         'image1' => 'image|nullable|max:1999',
         'subcategory' => 'nullable',
        'c_level' => 'nullable',
        'gender' => 'nullable',
        'payment_method1' => 'nullable',
        'payment_method2' => 'nullable',
        'payment_method3' => 'nullable',
        'payment_method4' => 'nullable',
        'payment_method5' => 'nullable',
        'payment_method6' => 'nullable',
        'price' => 'nullable',
        'condition' => 'nullable',
        'purpose' => 'nullable',
        'p_type' => 'nullable',
        'bedrooms' => 'nullable',
        'bathrooms' => 'nullable',
        'expire' => 'nullable',
        'area' => 'nullable',
        'p_available' => 'nullable',
        'j_type' => 'nullable',
        'startd' => 'nullable',
        'endd' => 'nullable',
        'starttime' => 'nullable',
        'endtime' => 'nullable',
        'color' => 'nullable',
        'age' => 'nullable',
        'image2' => 'image|nullable',
        'video' => 'nullable',
        'address2' => 'nullable',
        'info' => 'nullable'
         ]);


         //Handle file upload
         if($request->hasFile('image1')){
            //Get file name with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           // $extension = $request->file('image1')->getClientOriginalExtension();

            $image = $request->file('image1');
            $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

            $watermark = Image::make('img/AMAS.png');
            $destinationPath = public_path('img/cover_images/listings');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
            }
            // File name to store
            $fileNameTostoreone = $img;

            // Upload Imagesave($destinationPath.'/'.$img);
            //$img = Image::make($request->file('image1'));
            //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
            Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
                $constraint->aspectRatio();
            })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
            //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
            //$request->file('image1')
        }
        else{
            //default image for post if none was choosed
            $fileNameTostoreone = 'AMAS.png';
        }
        
        //Handle file upload
        if($request->hasFile('image2')){
           //Get file name with the extension
           $filenameWithExt = $request->file('image2')->getClientOriginalName();
           //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

           // Get just Ext
           //$extension = $request->file('image2')->getClientOriginalExtension();

           $image = $request->file('image2');
           $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

           $watermark = Image::make('img/AMAS.png');
           $destinationPath = public_path('img/cover_images/listings');
           if (!File::isDirectory($destinationPath)) {
               File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
           }
           // File name to store
           $fileNameTostoretwo = $img;

           // Upload Imagesave($destinationPath.'/'.$img);
           //$img = Image::make($request->file('image1'));
           //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
           Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
               $constraint->aspectRatio();
           })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
           //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
           //$request->file('image2')
       }
       else{
           //default image for post if none was choosed
           $fileNameTostoretwo = 'AMAS.png';
       }
           // Create new post
    $listing = new Listings;
    $purpose1 = $_POST['purpose1'];
    $purpose2 = $_POST['purpose2'];
    $purpose3 = $_POST['purpose3'];
    $purpose4 = $_POST['purpose4'];
    $purpose5 = $_POST['purpose5'];
    $purpose6 = $_POST['purpose6'];
    $purpose7 = $_POST['purpose7'];
    $purpose8 = $_POST['purpose8'];
    $purpose9 = $_POST['purpose9'];
    $purpose10 = $_POST['purpose10'];
    $purpose11 = $_POST['purpose11'];
    $purpose12 = $_POST['purpose12'];
    if($purpose1 !== 'N/A'){
        $listing->purpose = $purpose1;
    }  
     if($purpose2 !== 'N/A'){
        $listing->purpose = $purpose2;
    }
    if($purpose3 !== 'N/A'){
        $listing->purpose = $purpose3;
    }
    if($purpose4 !== 'N/A'){
        $listing->purpose = $purpose4;
    }
    if($purpose5 !== 'N/A'){
        $listing->purpose = $purpose5;
    }
    if($purpose6 !== 'N/A'){
        $listing->purpose = $purpose6;
    }
    if($purpose7 !== 'N/A'){
        $listing->purpose = $purpose7;
    }
    if($purpose8 !== 'N/A'){
        $listing->purpose = $purpose8;
    }
    if($purpose9 !== 'N/A'){
        $listing->purpose = $purpose9;
    }
    if($purpose10 !== 'N/A'){
        $listing->purpose = $purpose10;
    }
    if($purpose11 !== 'N/A'){
        $listing->purpose = $purpose11;
    }
    if($purpose12 !== 'N/A'){
        $listing->purpose = $purpose12;
    }
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $price3 = $_POST['price3'];
    $price4 = $_POST['price4'];
    $price5 = $_POST['price5'];
    $price6 = $_POST['price6'];
    $price7 = $_POST['price7'];
    $price8 = $_POST['price8'];
    $price9 = $_POST['price9'];
    $price10 = $_POST['price10'];
    $price11 = $_POST['price11'];
    $price12 = $_POST['price12'];
    $price13 = $_POST['price13'];
    $price14 = $_POST['price14'];
    $price15 = $_POST['price15'];
    if(!empty($price1)){
        $listing->price = $price1;
    }  
     if(!empty($price2)){
        $listing->price = $price2;
    }
    if(!empty($price3)){
        $listing->price = $price3;
    }
    if(!empty($price4)){
        $listing->price = $price4;
    }
    if(!empty($price5)){
        $listing->price = $price5;
    }
    if(!empty($price6)){
        $listing->price = $price6;
    }
    if(!empty($price7)){
        $listing->price = $price7;
    }
    if(!empty($price8)){
        $listing->price = $price8;
    }
    if(!empty($price9)){
        $listing->price = $price9;
    }
    if(!empty($price10)){
        $listing->price = $price10;
    }
    if(!empty($price11)){
        $listing->price = $price11;
    }
    if(!empty($price12)){
        $listing->price = $price12;
    }
    if(!empty($price13)){
        $listing->price = $price13;
    }
    if(!empty($price14)){
        $listing->price = $price14;
    }
    if(!empty($price15)){
        $listing->price = $price15;
    }
   // $condition1 = $_POST['condition1'];
    $condition2 = $_POST['condition2'];
    $condition3 = $_POST['condition3'];
    $condition4 = $_POST['condition4'];
    $condition5 = $_POST['condition5'];
    $condition6 = $_POST['condition6'];
    $condition7 = $_POST['condition7'];
    $condition8 = $_POST['condition8'];
    $condition10 = $_POST['condition10'];
    $condition11 = $_POST['condition11'];
    $condition13 = $_POST['condition13'];
   // if($condition1 !== 'N/A'){
      //  $listing->condition = $condition1;
    //}  
     if($condition2 !== 'N/A'){
        $listing->condition = $condition2;
    }
    if($condition3 !== 'N/A'){
        $listing->condition = $condition3;
    }
    if($condition4 !== 'N/A'){
        $listing->condition = $condition4;
    }
    if($condition5 !== 'N/A'){
        $listing->condition = $condition5;
    }
    if($condition6 !== 'N/A'){
        $listing->condition = $condition6;
    }
    if($condition7 !== 'N/A'){
        $listing->condition = $condition7;
    }
    if($condition8 !== 'N/A'){
        $listing->condition = $condition8;
    }
    if($condition10 !== 'N/A'){
        $listing->condition = $condition10;
    }
    if($condition11 !== 'N/A'){
        $listing->condition = $condition11;
    }
    if($condition13 !== 'N/A'){
        $listing->condition = $condition13;
    }



    $listing->title = $request->input('title');//This will get the user input for title
    $subcategor1 = $_POST['subcategory1'];
    $subcategor2 = $_POST['subcategory2'];
    $subcategor3 = $_POST['subcategory3'];
    $subcategor4 = $_POST['subcategory4'];
    $subcategor5 = $_POST['subcategory5'];
    $subcategor6 = $_POST['subcategory6'];
    $subcategor7 = $_POST['subcategory7'];
    $subcategor8 = $_POST['subcategory8'];
    $subcategor9 = $_POST['subcategory9'];
    $subcategor10 = $_POST['subcategory10'];
    $subcategor11 = $_POST['subcategory11'];
    $subcategor12 = $_POST['subcategory12'];
    $subcategor13 = $_POST['subcategory13'];
    $subcategor14 = $_POST['subcategory14'];
    $subcategor15 = $_POST['subcategory15'];
    $subcategor16 = $_POST['subcategory16'];
    $subcategor17 = $_POST['subcategory17'];
    $subcategor18 = $_POST['subcategory18'];
    $subcategor19 = $_POST['subcategory19'];
    $subcategor20 = $_POST['subcategory20'];
    if($subcategor1 !== 'N/A'){
        $listing->subcategory = $subcategor1;
    }  
     if($subcategor2 !== 'N/A'){
        $listing->subcategory = $subcategor2;
    }
    if($subcategor3 !== 'N/A'){
        $listing->subcategory = $subcategor3;
    }
    if($subcategor4 !== 'N/A'){
        $listing->subcategory = $subcategor4;
    }
    if($subcategor5 !== 'N/A'){
        $listing->subcategory = $subcategor5;
    }
    if($subcategor6 !== 'N/A'){
        $listing->subcategory = $subcategor6;
    }
    if($subcategor7 !== 'N/A'){
        $listing->subcategory = $subcategor7;
    }
    if($subcategor8 !== 'N/A'){
        $listing->subcategory = $subcategor8;
    }
    if($subcategor9 !== 'N/A'){
        $listing->subcategory = $subcategor9;
    }
    if($subcategor10 !== 'N/A'){
        $listing->subcategory = $subcategor10;
    }
    if($subcategor11 !== 'N/A'){
        $listing->subcategory = $subcategor11;
    }
    if($subcategor12 !== 'N/A'){
        $listing->subcategory = $subcategor12;
    }
    if($subcategor13 !== 'N/A'){
        $listing->subcategory = $subcategor13;
    }
    if($subcategor14 !== 'N/A'){
        $listing->subcategory = $subcategor14;
    }
    if($subcategor15 !== 'N/A'){
        $listing->subcategory = $subcategor15;
    }
    if($subcategor16 !== 'N/A'){
        $listing->subcategory = $subcategor16;
    }
    if($subcategor17 !== 'N/A'){
        $listing->subcategory = $subcategor17;
    }
    if($subcategor18 !== 'N/A'){
        $listing->subcategory = $subcategor18;
    }
    if($subcategor19 !== 'N/A'){
        $listing->subcategory = $subcategor19;
    }
    if($subcategor20 !== 'N/A'){
        $listing->subcategory = $subcategor20;
    }

   $listing->category = $request->input('category');
    $listing->description = $request->input('description');
   //This will get the user input for title
    $listing->phone = $request->input('phone');
    $listing->country = $request->input('country');
    $listing->address1 = $request->input('address1');//This will get the user input for title
    $listing->address2 = $request->input('address2');
    $listing->career_level = $request->input('c_level');
    $listing->positions_available = $request->input('p_available');//This will get the user input for title
    $listing->gender = $request->input('gender');
    $listing->payment_method1 = $request->input('payment_method1');
    $listing->payment_method2 = $request->input('payment_method2');
    $listing->payment_method3 = $request->input('payment_method3');
    $listing->payment_method4 = $request->input('payment_method4');
    $listing->payment_method5 = $request->input('payment_method5');
    $listing->payment_method6 = $request->input('payment_method6');
    $listing->type = 'free';
    $listing->property_type = $request->input('p_type');
    $listing->bedrooms = $request->input('bedrooms');//This will get the user input for title
    $listing->bathrooms = $request->input('bathrooms');
    $listing->expire_after = $request->input('expire');
    $listing->land_area = $request->input('area');//This will get the user input for title
    $listing->start_date = $request->input('startd');
    $listing->end_date = $request->input('endd');
    $listing->job_type = $request->input('j_type');
    $listing->start_time = $request->input('starttime');
    $listing->end_time = $request->input('endtime');
    $listing->color = $request->input('color');
    $listing->age = $request->input('age');
    $listing->video = $request->input('video');
    $listing->info = $request->input('info');//This will get the user input for title
    //$listing->status = $request->input('status');
    $listing->priority = 'Yes';
     //add the user id to post
    $listing->user_id = auth()->user()->id;
    $listing->username = auth()->user()->u_name;
    $listing->user_email = auth()->user()->email;
    $listing->image1 = $fileNameTostoreone;
    $listing->image2 = $fileNameTostoretwo;
    //$post->summary = $request->input('summary');
    //$post->file = $fileNameTostorepdf;
     //Save to db
     $listing->save(); 
     
     $data = request()->validate([
        'title' => 'required',
    ]);

    //Send mail
       
        Mail::to('amaslink@gmail.com')->send(new ListingNotificationMail($data));
     //print success message and redirect
     return redirect('/dashboard')->with('success', 'Listing Submitted, kindly wait for our moderators to approve it. Thanks');//I just set the message for session(success).

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
        $listing = Listings::find($id);
        $listings = Listings::orderBy('id', 'desc')->paginate(5);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
            'listing' => $listing,
            'listings' => $listings,
            'latests' => $latests,
            'posts' => $posts
        );
        
       if($listing->showPost()){
           // this will test if the user viwed the post or not
        return view('listings.show')->with($data);
        }

        //$post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
        ListingView::createViewLog($listing);
       // return $post;
       // return view('posts.showpublic')->with('post', $post);
        return view('listings.show')->with($data);
          //Rest of method...
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_f()
    {
        //
        $id = $_POST['id'];
        //$favorite = Favorite::where('listing_id', '=', $id)->get('listing_id');
        $listing = Listings::find($id);
        $listings = Listings::orderBy('id', 'desc')->paginate(5);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
            'listing' => $listing,
            'listings' => $listings,
            'latests' => $latests,
            'posts' => $posts
        );
        
       //if($listing->showPost($id)){
           // this will test if the user viwed the post or not
        //return view('listings.show')->with($data);
       // }

        //$post->increment('views');//I have a separate column for views in the post table. This will increment the views column in the posts table.
        ListingView::createViewLog($listing);
       // return $post;
       // return view('posts.showpublic')->with('post', $post);
        return view('listings.show_f')->with($data);
          //Rest of method...
        
    }
    public function show_bid($id)
    {
        //
        $listing = Listings::find($id);
        $listings = Listings::orderBy('id', 'desc')->paginate(5);
        $latests = Listings::orderBy('created_at', 'desc')->where('type','paid')->where('status','approved')->paginate(6);
        $posts = Posts::orderBy('created_at', 'desc')->paginate(2);
        $data = array(
            'listing' => $listing,
            'listings' => $listings,
            'latests' => $latests,
            'posts' => $posts
        );
        
       if($listing->showPost()){
           // this will test if the user viwed the post or not
        return view('listings.show')->with($data);
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
        
        $listing = Listings::find($id);
        $countries = Countries::all();
        return view('listings.edit',compact('countries'))->with('listing', $listing);
    }
    public function edit_t($id)
    {
        
        $listing = Listings::find($id);
        $countries = Countries::all();
        return view('listings.edit',compact('countries'))->with('listing', $listing);
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
         //Handle file upload
         if($request->hasFile('image1')){
            //Get file name with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just Ext
           // $extension = $request->file('image1')->getClientOriginalExtension();

            $image = $request->file('image1');
            $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

            $watermark = Image::make('img/AMAS.png');
            $destinationPath = public_path('img/cover_images/listings');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
            }
            // File name to store
            $fileNameTostoreone = $img;

            // Upload Imagesave($destinationPath.'/'.$img);
            //$img = Image::make($request->file('image1'));
            //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
            Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
                $constraint->aspectRatio();
            })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
            //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
            //$request->file('image1')
        }
        else{
            //default image for post if none was choosed
            $fileNameTostoreone = 'AMAS.png';
        }
        
        //Handle file upload
        if($request->hasFile('image2')){
           //Get file name with the extension
           $filenameWithExt = $request->file('image2')->getClientOriginalName();
           //get just file name
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

           // Get just Ext
           //$extension = $request->file('image2')->getClientOriginalExtension();

           $image = $request->file('image2');
           $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

           $watermark = Image::make('img/AMAS.png');
           $destinationPath = public_path('img/cover_images/listings');
           if (!File::isDirectory($destinationPath)) {
               File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
           }
           // File name to store
           $fileNameTostoretwo = $img;

           // Upload Imagesave($destinationPath.'/'.$img);
           //$img = Image::make($request->file('image1'));
           //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
           Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
               $constraint->aspectRatio();
           })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
           //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
           //$request->file('image2')
       }
       else{
           //default image for post if none was choosed
           $fileNameTostoretwo = 'AMAS.png';
       }
       //Handle file upload
       if($request->hasFile('image3')){
          //Get file name with the extension
          $filenameWithExt = $request->file('image3')->getClientOriginalName();
          //get just file name
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          // Get just Ext
          //$extension = $request->file('image3')->getClientOriginalExtension();

          $image = $request->file('image3');
          $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

          $watermark = Image::make('img/AMAS.png');
          $destinationPath = public_path('img/cover_images/listings');
          if (!File::isDirectory($destinationPath)) {
              File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
          }
          // File name to store
          $fileNameTostorethree = $img;

          // Upload Imagesave($destinationPath.'/'.$img);
          //$img = Image::make($request->file('image3'));
          //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
          Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
              $constraint->aspectRatio();
          })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
          //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
          //$request->file('image3')
      }
      else{
          //default image for post if none was choosed
          $fileNameTostorethree = 'AMAS.png';
      }
      //Handle file upload
      if($request->hasFile('image4')){
         //Get file name with the extension
         $filenameWithExt = $request->file('image4')->getClientOriginalName();
         //get just file name
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         // Get just Ext
        // $extension = $request->file('image4')->getClientOriginalExtension();

         $image = $request->file('image4');
         $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

         $watermark = Image::make('img/AMAS.png');
         $destinationPath = public_path('img/cover_images/listings');
         if (!File::isDirectory($destinationPath)) {
             File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
         }
         // File name to store
         $fileNameTostorefour = $img;

         // Upload Imagesave($destinationPath.'/'.$img);
         //$img = Image::make($request->file('image1'));
         //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
         Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
             $constraint->aspectRatio();
         })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
         //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
         //$request->file('image4')
     }
     else{
         //default image for post if none was choosed
         $fileNameTostorefour = 'AMAS.png';
     }
     //Handle file upload
     if($request->hasFile('image5')){
        //Get file name with the extension
        $filenameWithExt = $request->file('image5')->getClientOriginalName();
        //get just file name
        //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just Ext
        $extension = $request->file('image5')->getClientOriginalExtension();

        $image = $request->file('image5');
        $img = $filename.'_'.time().'.'.$image->getClientOriginalExtension();

        $watermark = Image::make('img/AMAS.png');
        $destinationPath = public_path('img/cover_images/listings');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory(public_path('img/cover_images/listings/'), 0777, true, true);
        }
        // File name to store
        $fileNameTostorefive = $img;

        // Upload Imagesave($destinationPath.'/'.$img);
        //$img = Image::make($request->file('image1'));
        //$img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10);
        Image::make($image->getRealPath())/**->resize(300, 365, function ($constraint) {
            $constraint->aspectRatio();
        })**/->insert($watermark, 'bottom-right', 10, 10)->save($destinationPath.'/'.$img);
        //$path = $img->insert(public_path('img/AMAS.png'), 'bottom-right', 10, 10)->save('img/cover_images/listings', $fileNameTostoreone);
        //$request->file('image5')
    }
    else{
        //default image for post if none was choosed
        $fileNameTostorefive = 'AMAS.png';
    }
     
               // Create new post
        $listing = Listings::find($id);
        $purpose1 = $_POST['purpose1'];
        $purpose2 = $_POST['purpose2'];
        $purpose3 = $_POST['purpose3'];
        $purpose4 = $_POST['purpose4'];
        $purpose5 = $_POST['purpose5'];
        $purpose6 = $_POST['purpose6'];
        $purpose7 = $_POST['purpose7'];
        $purpose8 = $_POST['purpose8'];
        $purpose9 = $_POST['purpose9'];
        $purpose10 = $_POST['purpose10'];
        $purpose11 = $_POST['purpose11'];
        $purpose12 = $_POST['purpose12'];
        if($purpose1 !== 'N/A'){
            $listing->purpose = $purpose1;
        }  
         if($purpose2 !== 'N/A'){
            $listing->purpose = $purpose2;
        }
        if($purpose3 !== 'N/A'){
            $listing->purpose = $purpose3;
        }
        if($purpose4 !== 'N/A'){
            $listing->purpose = $purpose4;
        }
        if($purpose5 !== 'N/A'){
            $listing->purpose = $purpose5;
        }
        if($purpose6 !== 'N/A'){
            $listing->purpose = $purpose6;
        }
        if($purpose7 !== 'N/A'){
            $listing->purpose = $purpose7;
        }
        if($purpose8 !== 'N/A'){
            $listing->purpose = $purpose8;
        }
        if($purpose9 !== 'N/A'){
            $listing->purpose = $purpose9;
        }
        if($purpose10 !== 'N/A'){
            $listing->purpose = $purpose10;
        }
        if($purpose11 !== 'N/A'){
            $listing->purpose = $purpose11;
        }
        if($purpose12 !== 'N/A'){
            $listing->purpose = $purpose12;
        }
        $price1 = $_POST['price1'];
        $price2 = $_POST['price2'];
        $price3 = $_POST['price3'];
        $price4 = $_POST['price4'];
        $price5 = $_POST['price5'];
        $price6 = $_POST['price6'];
        $price7 = $_POST['price7'];
        $price8 = $_POST['price8'];
        $price9 = $_POST['price9'];
        $price10 = $_POST['price10'];
        $price11 = $_POST['price11'];
        $price12 = $_POST['price12'];
        $price13 = $_POST['price13'];
        $price14 = $_POST['price14'];
        $price15 = $_POST['price15'];
        if(!empty($price1)){
            $listing->price = $price1;
        }  
         if(!empty($price2)){
            $listing->price = $price2;
        }
        if(!empty($price3)){
            $listing->price = $price3;
        }
        if(!empty($price4)){
            $listing->price = $price4;
        }
        if(!empty($price5)){
            $listing->price = $price5;
        }
        if(!empty($price6)){
            $listing->price = $price6;
        }
        if(!empty($price7)){
            $listing->price = $price7;
        }
        if(!empty($price8)){
            $listing->price = $price8;
        }
        if(!empty($price9)){
            $listing->price = $price9;
        }
        if(!empty($price10)){
            $listing->price = $price10;
        }
        if(!empty($price11)){
            $listing->price = $price11;
        }
        if(!empty($price12)){
            $listing->price = $price12;
        }
        if(!empty($price13)){
            $listing->price = $price13;
        }
        if(!empty($price14)){
            $listing->price = $price14;
        }
        if(!empty($price15)){
            $listing->price = $price15;
        }
       // $condition1 = $_POST['condition1'];
        $condition2 = $_POST['condition2'];
        $condition3 = $_POST['condition3'];
        $condition4 = $_POST['condition4'];
        $condition5 = $_POST['condition5'];
        $condition6 = $_POST['condition6'];
        $condition7 = $_POST['condition7'];
        $condition8 = $_POST['condition8'];
        $condition10 = $_POST['condition10'];
        $condition11 = $_POST['condition11'];
        $condition13 = $_POST['condition13'];
       // if($condition1 !== 'N/A'){
          //  $listing->condition = $condition1;
        //}  
         if($condition2 !== 'N/A'){
            $listing->condition = $condition2;
        }
        if($condition3 !== 'N/A'){
            $listing->condition = $condition3;
        }
        if($condition4 !== 'N/A'){
            $listing->condition = $condition4;
        }
        if($condition5 !== 'N/A'){
            $listing->condition = $condition5;
        }
        if($condition6 !== 'N/A'){
            $listing->condition = $condition6;
        }
        if($condition7 !== 'N/A'){
            $listing->condition = $condition7;
        }
        if($condition8 !== 'N/A'){
            $listing->condition = $condition8;
        }
        if($condition10 !== 'N/A'){
            $listing->condition = $condition10;
        }
        if($condition11 !== 'N/A'){
            $listing->condition = $condition11;
        }
        if($condition13 !== 'N/A'){
            $listing->condition = $condition13;
        }
    
    
        $subcategor1 = $_POST['subcategory1'];
        $subcategor2 = $_POST['subcategory2'];
        $subcategor3 = $_POST['subcategory3'];
        $subcategor4 = $_POST['subcategory4'];
        $subcategor5 = $_POST['subcategory5'];
        $subcategor6 = $_POST['subcategory6'];
        $subcategor7 = $_POST['subcategory7'];
        $subcategor8 = $_POST['subcategory8'];
        $subcategor9 = $_POST['subcategory9'];
        $subcategor10 = $_POST['subcategory10'];
        $subcategor11 = $_POST['subcategory11'];
        $subcategor12 = $_POST['subcategory12'];
        $subcategor13 = $_POST['subcategory13'];
        $subcategor14 = $_POST['subcategory14'];
        $subcategor15 = $_POST['subcategory15'];
        $subcategor16 = $_POST['subcategory16'];
        $subcategor17 = $_POST['subcategory17'];
        $subcategor18 = $_POST['subcategory18'];
        $subcategor19 = $_POST['subcategory19'];
        $subcategor20 = $_POST['subcategory20'];
        if($subcategor1 !== 'N/A'){
            $listing->subcategory = $subcategor1;
        }  
         if($subcategor2 !== 'N/A'){
            $listing->subcategory = $subcategor2;
        }
        if($subcategor3 !== 'N/A'){
            $listing->subcategory = $subcategor3;
        }
        if($subcategor4 !== 'N/A'){
            $listing->subcategory = $subcategor4;
        }
        if($subcategor5 !== 'N/A'){
            $listing->subcategory = $subcategor5;
        }
        if($subcategor6 !== 'N/A'){
            $listing->subcategory = $subcategor6;
        }
        if($subcategor7 !== 'N/A'){
            $listing->subcategory = $subcategor7;
        }
        if($subcategor8 !== 'N/A'){
            $listing->subcategory = $subcategor8;
        }
        if($subcategor9 !== 'N/A'){
            $listing->subcategory = $subcategor9;
        }
        if($subcategor10 !== 'N/A'){
            $listing->subcategory = $subcategor10;
        }
        if($subcategor11 !== 'N/A'){
            $listing->subcategory = $subcategor11;
        }
        if($subcategor12 !== 'N/A'){
            $listing->subcategory = $subcategor12;
        }
        if($subcategor13 !== 'N/A'){
            $listing->subcategory = $subcategor13;
        }
        if($subcategor14 !== 'N/A'){
            $listing->subcategory = $subcategor14;
        }
        if($subcategor15 !== 'N/A'){
            $listing->subcategory = $subcategor15;
        }
        if($subcategor16 !== 'N/A'){
            $listing->subcategory = $subcategor16;
        }
        if($subcategor17 !== 'N/A'){
            $listing->subcategory = $subcategor17;
        }
        if($subcategor18 !== 'N/A'){
            $listing->subcategory = $subcategor18;
        }
        if($subcategor19 !== 'N/A'){
            $listing->subcategory = $subcategor19;
        }
        if($subcategor20 !== 'N/A'){
            $listing->subcategory = $subcategor20;
        }
    
    
        $listing->title = $request->input('title');//This will get the user input for title
        $listing->category = $request->input('category');
        $listing->description = $request->input('description');
        //$listing->subcategory = $request->input('subcategory');//This will get the user input for title
        $listing->phone = $request->input('phone');
        $listing->country = $request->input('country');
        $listing->address1 = $request->input('address1');//This will get the user input for title
        $listing->address2 = $request->input('address2');
        $listing->career_level = $request->input('c_level');
        $listing->positions_available = $request->input('p_available');//This will get the user input for title
        $listing->gender = $request->input('gender');
        $listing->payment_method1 = $request->input('payment_method1');
        $listing->payment_method2 = $request->input('payment_method2');
        $listing->payment_method3 = $request->input('payment_method3');
        $listing->payment_method4 = $request->input('payment_method4');
        $listing->payment_method5 = $request->input('payment_method5');
        $listing->payment_method6 = $request->input('payment_method6');
        //$listing->price = $request->input('price');//This will get the user input for title
        //$listing->condition = $request->input('condition');
        //$listing->purpose = $request->input('purpose');
        $listing->job_type = $request->input('j_type');
        $listing->property_type = $request->input('p_type');
        $listing->bedrooms = $request->input('bedrooms');//This will get the user input for title
        $listing->bathrooms = $request->input('bathrooms');
        $listing->expire_after = $request->input('expire');
        $listing->land_area = $request->input('area');//This will get the user input for title
        $listing->start_date = $request->input('startd');
        $listing->end_date = $request->input('endd');
        $listing->start_time = $request->input('starttime');
        $listing->end_time = $request->input('endtime');
        $listing->color = $request->input('color');
        $listing->age = $request->input('age');
        $listing->video = $request->input('video');
        $listing->info = $request->input('info');//This will get the user input for title
        if($request->hasFile('image1')){
        $listing->image1 = $fileNameTostoreone;
    } 
        if($request->hasFile('image2')){
        $listing->image2 = $fileNameTostoretwo;
    } 
        if($request->hasFile('image3')){
        $listing->image3 = $fileNameTostorethree;
    } 
        if($request->hasFile('image4')){
            $listing->image4 = $fileNameTostorefour;
        } 
        if($request->hasFile('image5')){
        $listing->image5 = $fileNameTostorefive;
        } 
        //$post->summary = $request->input('summary');
        //$post->file = $fileNameTostorepdf;
         //Save to db
         $listing->save(); 
         //print success message and redirect
         return redirect('/admin_pending')->with('success', 'Listing Updated.');//I just set the message for session(success).
    
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
       $listing = Listings::find($id);

       //If post is deleted, delete image toochmod($oldPicture, 0644);
    //unlink($oldPicture);

              /**if($listing->image1 != 'AMAS.png'){
                   //Delete image
                  unlink('img/cover_images/listings'.$listing->image1);
               }
               if($listing->image2 != 'AMAS.png'){
                    //Delete image
                    unlink('img/cover_images/listings'.$listing->image2);
                }
                if($listing->image3 != 'AMAS.png'){
                     //Delete image
                     unlink('img/cover_images/listings'.$listing->image3);
                 }
                 if($listing->image4 != 'AMAS.png'){
                      //Delete image
                      unlink('img/cover_images/listings'.$listing->image4);
                  }
       
                  if($listing->image5 != 'AMAS.png'){
                    //Delete image
                    unlink('img/cover_images/listings'.$listing->image5);
                }
               //check correct user (this will restrict destroy access only to the post owner)
              // if(auth()->user()->id !==$post->user_id){
                //   return redirect('/posts')->with('error', 'Unauthorized page.');
               //}***/
               $listing->delete();
       
               return redirect()->back()->with('success', 'Post Deleted');
         
    }
     
    public function removeimg()
    {
        // //
        $id = $_GET['id'];
       $listing = Listings::find($id);
       //unlink(public_path().'/img/cover_images/listings/'.$listing->image1);

       $listing->image1 = 'AMAS.png';
               //$listing->image1->delete();
               $listing->save();
               return redirect()->back()->with('success', 'Image Removed');
         
    }

////bookmark
    public function bookmark(Request $request) {
        $user_id = Auth::id();
        $listing_id = $request->id;
        $bookmark = User::find($user_id)->bookmarks()->where('user_id', '=', $user_id)->where('listing_id', '=', $listing_id)->first();

        if(empty($bookmark)) {
             $bookmark =  Favorite::create(array(
                 'user_id' => $user_id,
                 'listing_id' => $request->id,
                 'listing_type' => $request->type,
                 'title' => $request->title,
                 'image1' => $request->image,
             ));

        return  redirect()->back()->with('alert', 'Bookmarked!');
        } else {
             $bookmark->delete();
             return  redirect()->back()->with('alert', 'Bookmark removed!');
        }   
        return redirect()->back()
            ->with('global', 'We were unable to bookmark the article. Please, try again later.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removebookmark() {
        $user_id = Auth::id();
        $id = $_POST['id'];
        //$listing_id = $request->id;
        $bookmark = Favorite::find($id)->where('user_id',$user_id)->where('id',$id);
            $bookmark->delete();
            return  redirect()->back()->with('alert', 'Bookmark removed!');
       
    }
    
    ////delist/mark as sold out
    public function delist(Request $request) {
        $user_id = Auth::id();
        $listing_id = $request->listing_id;
        $listing_user = $request->listing_user;
        $delist = Listings::find($listing_id);
        if ( $listing_user == $user_id) {
        
            $delist->status = 'sold/expired';
            $delist->save();
            return  redirect()->back()->with('success', 'Thanks for listing on Amaslink, We hope to see you again.');
        } else {
            return  redirect()->back()->with('error', 'You are not authorized to perform this operation.');
        }
    }
 }
   
