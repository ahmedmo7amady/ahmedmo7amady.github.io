<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\AboutUs;
use App\Http\Controllers\Controller;

class UserAboutController extends Controller
{
    public function show(){
        $data = AboutUs::find(1);
        return view('user.pages.about')->with('data' , $data);
    }
}
