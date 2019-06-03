<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AddblogController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function formview()

    {

        return view('admin.addblog');

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    /* protected $fillable = ['name', 'email','password','phone']; */

    protected function addblogedata(Request $request)
    {


        $this->validate($request, [

            'blog_titile' => 'required'
        ]);
        $input['blog_titile'] = Input::get('blog_titile');
        $input['blog_text'] = Input::get('blog_text');
        $rules = array(
            'blog_titile' => 'required|unique:blog,blog_text',
            'blog_text' => 'required',
            'photo' => 'required|max:1024|mimes:jpg,jpeg,png'

        );
        $messages = array(
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
                $userphoto="/blogphoto/";
                $path = base_path('images'.$userphoto.$filename);
                $destinationPath=base_path('images'.$userphoto);
                Input::file('photo')->move($destinationPath, $filename);
                $namef=$filename;
            }
            else
            {
                $namef="";
            }

            $data = $request->all();

            $blog_titile=$data['blog_titile'];
            $article_name=$data['article_name'];
            $keywords=$data['keywords'];
            $full_description=$data['full_description'];
            $blog_text=$data['blog_text'];
            $ldate = date('Y-m-d');

            DB::insert('insert into blog (blog_titile, photo ,blog_text,date_time,article_name,keywords,full_description) values (?, ?, ?, ?,?,?,?)', [$blog_titile,$namef,$blog_text,$ldate,$article_name,$keywords,$full_description]);


            return back()->with('success', 'Blog has been created');



        }




    }
}
