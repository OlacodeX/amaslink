<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{   public function store(Request $request)
    {
    
     //send mail
     $data = request()->validate([
        'name' => 'required',
        'email' => 'required',
        'number' => 'required',
        'message' => 'required',
    ]);

    //Send mail
       
       Mail::to('amaslink@gmail.com')->send(new ContactMail($data));
       
        //Mail::to('aluko798@gmail.com')->send(new ContactMail($data));
      
     //print success message and redirect
     return redirect('./contact')->with('success', 'Enquiry Submitted, We appreciate you reaching out to us. We will get back to you soon!');//I just set the message for session(success).

    }

}
