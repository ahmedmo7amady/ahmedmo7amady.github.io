<?php

namespace App\Http\Controllers\Admin;
use App\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAboutController extends Controller
{
    public function Edit(){
        $data = AboutUs::find(1);
         return view('admin.pages.about')->with('data' , $data);
        }
    public function update(Request $request){
        
        $request->validate([
            'title'  => 'required',
            'Fp' => 'required',
            'Sp' => 'required',
            'posstimage' => 'image|mimes:jpeg,jpg,bmp,png|max:1999'
            
        ]);
        if($request->hasFile('postimage')){
            dd('done');
            $file = $request->file('postimage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'aboutimage'. '_' . time() . '.' .$ext;
            $file->storeAs('public/aboutimage' , $filename) ;
        }
        else{
            $filename = 'noimage.png';
        }
        $data = AboutUs::find(1);
        if($data == null){
            AboutUs::Create([
                'id' => '1',
                'title' => request('title'),
                'Fp' => request('Fp'),
                'Sp' => request('Sp'),
                'image' => $filename
            ]);
            return back()->with(['data' => $data , 'success'=>'Data Updated Success']);
        }else{ 
            $data->title = request('title');
            $data->Fp = request('Fp');
            $data->Sp = request('Sp');
            $data->image = $filename;
            $data->save();
            return back()->with(['data' => $data , 'success'=>'New Data Updated']);
        }
        
    }
}
