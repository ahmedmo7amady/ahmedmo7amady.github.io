<?php

namespace App\Http\Controllers\Admin;
use App\chefs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = chefs::orderby('created_at' , 'desc')->paginate(15);
        return view('admin.pages.chefs.index')->with('chefs' ,$chefs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'name' => 'required',
            'description' => 'required',
            'depart' => 'required',
            'FacebookLink' => 'required',
            'TweeterLink' => 'required',
            'LinkedInLink' => 'required',
            'chef_image' => 'image|mimes:jpeg,bmp,png|max:1999'
        ]);
        if($request->hasFile('chef_image')){
            $file = $request->file('chef_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'chef_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/chefimages' , $filename);
        }else{
            $filename = 'noimage.png';
        }
        
        chefs::create([
            'name' => request('name'),
            'description' => request('description'),
            'depart' => request('depart'),
            'FBlink' => request('FacebookLink'),
            'TWlink' => request('TweeterLink'),
            'INlink' => request('LinkedInLink'),
            'image' => $filename
        ]);
        return redirect('admin/chef')->with('success' , 'New Chef Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = chefs::find($id); 
        return view ('admin.pages.chefs.edit')->with('chef' , $chef);
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
        $this->validate($request ,[
            'name' => 'required',
            'description' => 'required',
            'depart' => 'required',
            'FacebookLink' => 'required',
            'TweeterLink' => 'required',
            'LinkedInLink' => 'required',
            'chef_image' => 'image|mimes:jpeg,bmp,png|max:1999'
        ]);
        if($request->hasFile('chef_image')){
            $file = $request->file('chef_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'chef_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/chefimages' , $filename);
        }else{
            $filename = 'noimage.png';
        }
        
        $chef=chefs::find($id);
        $chef->name = request('name');
        $chef->description = request('description');
        $chef->depart = request('depart');
        $chef->FBlink = request('FacebookLink');
        $chef->TWlink = request('TweeterLink');
        $chef->INlink = request('LinkedInLink');
        $chef->image = $filename;
        $chef->save();
        return redirect('admin/chef')->with('success' , 'Chef Details Updated  ');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chef = chefs::find($id);
        $chef->delete();
        return back()->with('success' , 'chef Deleted Success ');
    }
}
