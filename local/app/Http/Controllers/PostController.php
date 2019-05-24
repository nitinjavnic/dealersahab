<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use Crypt;
use URL;

class PostController extends Controller
{
    public function formView()
    {
        return view('post_requirement');
    }


    public function save(Request $request){
        $data= $request->all();
        $username = $data['username'];
        $email = $data['email'];
        $phoneno = $data['phoneno'];
        $requiremnt = $data['requiremnt'];
        $date = date('Y-m-d');
        DB::insert('insert into post (username,email,phone,requirement,post_date) values (?, ?, ? , ?, ?)',
            [$username,$email,$phoneno,$requiremnt,$date]);
            return back()->with('success', 'Your Requirement has been save successfully!');

    }

}