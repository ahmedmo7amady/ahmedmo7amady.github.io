<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\events;
use App\table;
class BookingController extends Controller
{




        //      Start event functions
    public function showevent($id=null){
        $data = events::orderby('created_at' , 'desc')->paginate(5);
        
        if(isset($id)){
        $showdata = events::find($id);
        return view('admin.pages.event')->with([
            'data' => $data,
            'showdata' => $showdata
        ]);
        }else{
            $showdata = null;
            return view('admin.pages.event')->with([
                'data' => $data,
                'showdata' => $showdata
            ]);
        }
    }
    public function eventdestroy($id){

        $data = events::find($id);
        $data->delete();
        return back();
        
    }

    //      end event functions 


    //      Start table functions 
    public function showtable(){
        $data = table::orderby('created_at' , 'desc')->paginate(10);
        return view('admin.pages.table')->with([
            'data' => $data,
        ]);

        return view('admin.pages.table');
    }
    public function tabledestroy($id){
        $data = table::find($id);
        $data->delete();
        return back();
    }



        //      end  table functions 
}
