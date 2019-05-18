<?php

namespace App\Http\Controllers\Admin;

use App\categories;
use App\section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = categories::orderby('created_at' , 'desc')->paginate(10);
        
        return view('admin.pages.menu.categories')->with('data' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.menu.catcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
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
        $data = categories::create([
            'name' => request('name'),
            'image' =>$filename
        ]);

        return redirect('admin/menu/categories')->with('success' , 'The Categoriy Addes Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , section $section)
    {
        $data = categories::find($id);
        $sections = $data->section;
        return view('admin.pages.menu.showcat')->with([
            'data' => $data,
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = categories::find($id);
        return view('admin.pages.menu.catedit')->with('data' , $data);
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
        $data = $request->validate([
            'name' => 'required',
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
        $data=categories::find($id);
        $data->name = request('name');
        $data->image = $filename;
        $data->save();
        return back()->with('success' , 'the Category Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = categories::find($id);
        $data->delete();
        return back()->with('success' , 'Category Deleted Success');

    }
}
