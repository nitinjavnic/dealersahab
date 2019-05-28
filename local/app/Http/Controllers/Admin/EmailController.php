<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function email()
    {
        $seller = DB::table('users')->select('name')->where('admin', '2')->get();
        return view('admin/email', ['seller' => $seller]);


    }

    public function addemail(Request $request){

        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',

        ]);

        $rules = array(
            'subject'=>'required',
            'body' => 'required',

        );


        $messages = array(

            'email' => 'Required',
            'name' => 'Required'

        );


        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails())
        {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        }
        else
        {
            $image = Input::file('photo');
            if($image!="")
            {
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $userphoto="/Emailattachment/";
                $path = base_path('images'.$userphoto.$filename);
                Image::make($image->getRealPath())->save($path);
                $namef=$filename;
            }
            else
            {
                $namef="";
            }

            $data = $request->all();
        $role = $data['role'];
        $subject = $data['subject'];
        $users = $data['users'];
        $body = $data['body'];
        DB::insert('insert into email (users,role,subject,body,attachment) values (?, ?,?,?,?)', [$users,$role,$subject,$body,$namef]);
        return back()->with('success', 'Email Notification has been send');

    }
    }


}