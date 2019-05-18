<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\message;
class UserContactController extends Controller
{
    public function contact(){
        $data =Contact::orderby('created_at' , 'desc')->paginate(1);
                return view('user.pages.contact')->with('data' ,$data);
    }

    public function send_message(message $message , Request $request){
        $request->validate([
            'Fname'=>'required|min:3|max:15',
            'Lname'=>'required|min:3|max:15',
            'email'=>'required|min:3|max:30',
            'subject'=>'required|min:3|max:40',
            'message'=>'required|min:3|max:200'
        ]);
        $message::Create([
            'Fname' => request('Fname'),
            'Lname' => request('Lname'),
            'email' => request('email'),
            'subject' => request('subject'),
            'content' => request('message')
        ]);
        return back()->with('success' , 'message sent');
    }

}



