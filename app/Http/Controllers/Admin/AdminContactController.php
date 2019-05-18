<?php

namespace App\Http\Controllers\Admin;
use App\Contact;
use App\message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function contact($id=null){
        $messages =  message::orderby('created_at' , 'desc')->paginate(6);
        $data = Contact::find(1);

        if (isset($id)){
            
        $onemessage = message::find($id);
            return view('admin.pages.contact')->with([
                'messages' => $messages , 
                'onemessage' => $onemessage,
                'data' => $data
            ]);
        }
        else{
            $onemessage = message::find($id);
            return view('admin.pages.contact')->with([
                'messages' => $messages , 
                'onemessage' => null,
                'data' => $data
            ]);
        }
    }
    
    public function update (Request $request){
        
            $request->validate([
                'finfo'   => 'required|min:2|max:500',
                'sinfo'   => 'required|min:2|max:500',
                'address' => 'required|min:2|max:60',
                'phone'   => 'required|min:6|max:15',
                'email'   => 'required|min:5|max:35'
            ]);
            $data = Contact::find(1)->first();
            if($data == null){
                AboutUs::Create([
                    'id' => '1',
                    'firstpr' => request('finfo'),
                    'secondpr' => request('sinfo'),
                    'address' => request('address'),
                    'phone' => request('phone'),
                    'email' => request('email')
                ]);
                
                return redirect('admin/contact')->with(['data' => $data , 'success'=>'Data Updated Success']);
            }else{ 
                $data->firstpr = request('finfo');
                $data->secondpr = request('sinfo');
                $data->address = request('address');
                $data->phone = request('phone');
                $data->email = request('email');
                $data->save();
                
                return redirect('admin/contact')->with(['data' => $data , 'success'=>'New Data Added']);
            }
    }

    public function destroy($id){
        $message = message::find($id);
        $message->delete();
        return redirect('admin/contact')->with('success' , 'message Deleted');
    }




    
}
