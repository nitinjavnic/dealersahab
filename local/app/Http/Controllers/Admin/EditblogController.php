<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EditblogController extends Controller
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


    public function showform($id) {
        $services = DB::select('select * from blog where id = ?',[$id]);
        return view('admin.editblog',['services'=>$services]);
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
            'blog_text' => 'required|string|max:255'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */



    protected function editblogedata(Request $request)
    {

        $this->validate($request, [

            'blog_titile' => 'required'
        ]);

        $data = $request->all();

        $id=$data['id'];
        $input['blog_titile'] = Input::get('blog_titile');
        $rules = array(
            'blog_titile'=>'required|unique:blog,blog_titile,'.$id,
            'photo' => 'max:1024|mimes:jpg,jpeg,png'
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


            $blog_text=$data['blog_text'];
            $blog_title=$data['blog_titile'];
            $article_name=$data['article_name'];
            $keywords=$data['keywords'];
            $full_description=$data['full_description'];
            $currentphoto=$data['currentphoto'];

            $image = Input::file('photo');
            if($image!="")
            {
                $servicephoto="/blogphoto/";
                $delpath = base_path('images'.$servicephoto.$currentphoto);
                File::delete($delpath);
                $filename  = time() . '.' . $image->getClientOriginalExtension();

                $path = base_path('images'.$servicephoto.$filename);
                $destinationPath=base_path('images'.$servicephoto);

                /* Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
                Input::file('photo')->move($destinationPath, $filename);
                $savefname=$filename;
            }
            else
            {
                $savefname=$currentphoto;
            }

            /* DB::insert('insert into users (name, email,password,phone,admin) values (?, ?,?, ?,?)', [$name,$email,$password,$phone,$admin]);*/
            DB::update('update blog set article_name ="'.$article_name.'",full_description="'.$full_description.'",keywords="'.$keywords.'",blog_titile="'.$blog_title.'",blog_text="'.$blog_text.'",photo="'.$savefname.'" where id = ?', [$id]);

            return back()->with('success', 'Blog has been updated');
        }




    }


    public function activeblog($id){

        $blog = DB::select('select * from blog where id = ?',[$id]);
        $blog_active = $blog[0]->is_active;
        if($blog_active==0){
            $blog_text = 1;
            DB::update('update blog set is_active="'.$blog_text.'" where id = ?', [$id]);
            return back()->with('success', 'Blog has been active successfully!');

        }else if ($blog_active==1){
            $blog_text = 0;
            DB::update('update blog set is_active="'.$blog_text.'" where id = ?', [$id]);
            return back()->with('success', 'Blog has been active successfully!');

        }




    }
}
