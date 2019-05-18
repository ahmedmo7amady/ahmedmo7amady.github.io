<?php

namespace App\Http\Controllers\Admin;
use App\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    public function destroy($id){
        $data = comment::find($id);
        $data->delete();
        return back()->with('success' , 'the comment deleted success');
    }
}
