<?php

namespace App\Http\Controllers\Admin;

use App\section;
use App\chefs;
use App\categories;
use App\comment;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index(){

        $sec = section::all();
        $cat = categories::all();
        $chef = chefs::all();
        $comment = comment::all();
        $post = Blog::all();



        
        return view('admin.pages.home')->with([
            'sec' => $sec,
            'cat' => $cat,
            'chef' => $chef,
            'comment' => $comment,
            'post' => $post


        ]);
    }
}
