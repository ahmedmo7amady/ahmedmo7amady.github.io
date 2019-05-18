<?php

namespace App\Http\Controllers\User;
use App\section;
use App\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMenuController extends Controller
{
    public function index(){
        $categories = categories::all();
        return view('user.pages.menu')->with([
            'categories' => $categories
        ]);
    }
    
}
