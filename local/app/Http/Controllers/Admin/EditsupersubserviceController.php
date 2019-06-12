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


class EditsupersubserviceController extends Controller
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






    public function edit($id)

    {

        $subservices = DB::select('select * from subsuperservice where id = ?',[$id]);
        $services = DB::table('services')->orderBy('name', 'asc')->get();
        $subcategory = DB::table('subservices')->orderBy('subname', 'asc')->get();
        $data = array('subservices'=>$subservices, 'services'=>$services,'subcategory'=>$subcategory);
        return view('admin.editsupersubservice')->with($data);

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
            'name' => 'required|string|max:255'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */



    protected function editsupersubservicedata(Request $request)
    {

        $this->validate($request, [

            'name' => 'required'

        ]);
        $input['name'] = Input::get('name');

        $rules = array(

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


        if ($validator->fails())
        {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        }
        else
        {
            $data = $request->all();

            $name=$data['name'];
            $subid=$data['subid'];


            $currentphoto=$data['currentphoto'];


            $image = Input::file('photo');
            if($image!="")
            {
                $subservicephoto="/supersubservicephoto/";
                $delpath = base_path('images'.$subservicephoto.$currentphoto);
                File::delete($delpath);
                $filename  = time() . '.' . $image->getClientOriginalExtension();

                $path = base_path('images'.$subservicephoto.$filename);
                $destinationPath=base_path('images'.$subservicephoto);

                /* Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
                Input::file('photo')->move($destinationPath, $filename);
                $savefname=$filename;
            }
            else
            {
                $savefname=$currentphoto;
            }


            $service=$data['service'];
            $subservice=$data['subservice'];



            DB::update('update subsuperservice set subsupername="'.$name.'",service="'.$service.'",supersubimage="'.$savefname.'",subservice="'.$subservice.'" where id = ?', [$subid]);


            $url1= 'admin/supersubservices';
            return redirect($url1)->with('success', 'Sub service has been created');



        }




    }
}
