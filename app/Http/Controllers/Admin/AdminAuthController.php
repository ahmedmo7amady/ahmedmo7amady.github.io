<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function dologin(){
        $rememberme = request('rememberme') == 1 ? true : false ;
        if(auth()->guard('admin')->attempt(['email' => request('email')  , 'password' => request('password')]))
        {
            return redirect('admin');
        }
        else{
            session()->flash('error' , 'admin.incorrect_information_login');
            return redirect('admin/login');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');

    }
}
