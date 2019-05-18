<?php

namespace App\Http\Controllers\Admin;
use App\section;
use App\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMenuSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = section::orderby('created_at' , 'desc')->paginate(50);
        return view('admin.pages.menu.showcat')->with('data' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = categories::find($id);
        $cats = categories::all();

        return view('admin.pages.menu.seccreate')->with([
            'data' => $data,
            'cats'=> $cats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id , Request $request)
    {
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'note' =>'required',
            'cover_image' => 'image|mimes:jpg,jpeg,png'
        ]);
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'menuimage'. '_' . time() . '.' .$ext;
            $file->storeAs('public/menusections' , $filename) ;
        }
        else{
            $filename = 'noimage.png';
        }
        section::create([
            'categories_id' => $id,
            'name' => request('name'),
            'price' => request('price'),
            'note' => request('note'),
            'image' => $filename
        ]);
        return redirect('admin/menu/categories/' . $id)->with('success' , 'section Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = section::find($id);
        return view ('admin.pages.menu.secedit')->with('section' , $section);
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'note' => 'required',
            'cover_image' => 'image|mimes:jpg,jpeg,png'
        ]);

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'menuimage'. '_' . time() . '.' .$ext;
            $file->storeAs('public/menusections' , $filename) ;
        }
        else{
            $filename = 'noimage.png';
        }

        $section = section::find($id);
        $section->name = request('name');
        $section->price = request('price');
        $section->note = request('note');
        $data->image = $filename;
        $section->save();
        
        return redirect('admin/menu/categories/' . $id)->with('success' , 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = section::find($id);
        $section->delete();
        return back()->with('error' , 'Deleted');
    }
}
