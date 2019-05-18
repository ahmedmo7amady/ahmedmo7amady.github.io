<?php

namespace App\Http\Controllers\User;
use App\Blog;
use App\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function blogs(Blog $blog){
        $data = $blog->orderby('created_at' , 'desc')->paginate(3);
        return view('user.pages.blog' , compact('data'));
    }


    public function blogdetails($id  , Blog  $blog){
        $data = $blog::find($id);
        $comments = $data->comments;
        return view('user.pages.blogDetails' , compact('data' , 'comments'));
    }

    public function createcomment(Blog $blog  , Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'body'=> 'required'
        ]);
        comment::create([
            'name' => request('name'),
            'email' => request('email'),
            'body' => request('body'),
            'blog_id' => $blog->id
        ]);

        return back()->with('success' , 'comment Added success');

    

    }  





}
