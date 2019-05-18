<?php

namespace App\Http\Controllers\User;
use App\chefs;
use App\section;
use App\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserHomePageController extends Controller
{
    public function index(){
        $cats = categories::all();
        $sec = section::orderby('created_at' , 'desc')->paginate(6);
        $chefs = chefs::all();
        return view('User.index')->with([
            'cats'  => $cats,
            'sec'   => $sec,
            'chefs' => $chefs

        ]);
    }

}
