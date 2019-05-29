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


    public function email($id)
    {
        $users = DB::select('select * from users where id = ?',[$id]);
        $userid = $id;
        return view('admin.email',['users'=>$users, 'userid' => $userid]);

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

            'subject' => 'Required',
            'body' => 'Required'

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
                $path = base_path('images'.$userphoto);
                $image->move($path,$image->getClientOriginalName());
                $namef=$filename;
            }
            else
            {
                $namef="";
            }

            $data = $request->all();
        $subject = $data['subject'];
        $users = $data['id'];
        $body = $data['body'];
        DB::insert('insert into email (users,subject,body,attachment) values (?, ?,?,?)', [$users,$subject,$body,$namef]);
        return back()->with('success', 'Email Notification has been send');

    }
    }


}