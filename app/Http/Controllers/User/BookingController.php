<?php

namespace App\Http\Controllers\User;
use App\table;
use App\events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function booktable (Request  $request , table  $table){
        $request->validate([
            'date'=> 'required',
            'time'=>'required',
            'size'=> 'required'
        ]);
        $table::Create([
            'date' => request('date'),
            'time' => request('time'),
            'size' => request('size')
        ]);
        return back()->with('success' , 'Table Booked success');
    }
    public function bookevent (Request  $request , events  $event){
        $request->validate([
            'date'=> 'required',
            'time'=>'required',
            'size'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'notes'=> 'required'
        ]);
        $event::Create([
            'date' => request('date'),
            'time' => request('time'),
            'size' => request('size'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'notes' => request('notes')
        ]);
        return back()->with('success' , 'event Booked success');
    }

}
