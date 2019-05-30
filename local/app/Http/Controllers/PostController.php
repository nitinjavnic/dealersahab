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

    public function contactseller($id,$user_id)
    {
        $data=array('shop_id' =>$id,'user_id'=>$user_id);

        return view('conatactseller')->with($data);
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

    public function save_query(Request $request){
        $data= $request->all();
        $username = $data['username'];
        $phoneno = $data['phoneno'];
        $requiremnt = $data['requiremnt'];
        $shop_id = $data['shop_id'];
        $user_id = $data['user_id'];
        DB::insert('insert into contact_seller (name,phone,query,shop_id,user_id) values (?, ?, ?,?,?)',
            [$username,$phoneno,$requiremnt,$shop_id,$user_id]);
            return back()->with('success', 'Your query send to seller successfully!');

    }


    public function showinquery(Request $request){
        $userid = Auth::user()->id;
        $contact_seller = DB::table('contact_seller')
            ->where('user_id', '=', $userid)
            ->get();
        $count = DB::table('contact_seller')
            ->where('user_id', '=', $userid)
            ->count();

       $data=array('contact_seller' =>$contact_seller,'count'=>$count);
       return view('show_inquery')->with($data);


    }

}