<?php

namespace App\Http\Controllers\Admin;
use App\comment;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog , comment $comment)
    {
        $posts = Blog::orderby('created_at' , 'desc')->paginate(8);
        return view('admin.pages.blog.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Admin.pages.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Blog $blog )
    {
        $this->validate($request ,[
            'title' => 'required',
            'body' => 'required',
            'post_image' => 'image|mimes:jpeg,bmp,png|max:1999'
        ]);
        if($request->hasFile('post_image')){
            $file = $request->file('post_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'post_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/postsImages' , $filename);
        }else{
            $filename = 'noimage.png';
        }
        
        $blog::create([
            'title' => request('title'),
            'description' => request('body'),
            'image' => $filename
        ]);
        return redirect('admin/blog')->with('success' , 'Post Added Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Blog::find($id);
        $comments = $post->comments;
        if(isset($comments)){
            return view('admin.pages.Blog.show' )->with([
                'post' => $post,
                'comments' => $comments
            ]);
        }else{
            return view('admin.pages.Blog.show' )->with([
                'post' => $post,
                'comments' => null
            ]);
        }

            
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::find($id); 
        return view ('admin.pages.blog.edit')->with('post' , $post);
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
            'title'  => 'required',
            'body' => 'required',
            'post_image' => 'image|mimes:jpeg,jpg,bmp,png|max:1999'

        ]);

        if($request->hasFile('post_image')){
            $file = $request->file('post_image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'post_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/postsImages' , $filename);
            
        }else{
            $filename = 'noimage.png';
        }
        
        $post=Blog::find($id);
        $post->title = request('title');
        $post->description = request('body');
        $post->image = $filename;
        $post->save();
        return redirect('admin/blog')->with('success' , 'post created Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return back()->with('success' , 'Post Deleted Success ');
    }
}
