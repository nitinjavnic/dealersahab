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

class AddsupersubserviceController extends Controller
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

        return view('admin.addsupersubservice');

    }



    public function getservice()

    {

        $services = DB::table('services')->orderBy('name', 'asc')->get();
        $subservices = DB::table('subservices')
            ->leftJoin('services', 'services.id', '=', 'subservices.service')
            ->orderBy('subservices.subid','desc')
            ->get();
        return view('admin.addsupersubservice', ['services' => $services ,'subservice'=>$subservices]);

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

    protected function addsubservicedata(Request $request)
    {


        $this->validate($request, [

            'name' => 'required'

        ]);
        $input['name'] = Input::get('name');

        $rules = array(

            'name' => 'unique:subsuperservice,subsupername',
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
            $image = Input::file('photo');
            if($image!="")
            {
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $userphoto="/supersubservicephoto/";
                $path = base_path('images'.$userphoto.$filename);

                $destinationPath=base_path('images'.$userphoto);
                Image::make($image->getRealPath())->resize(300, 300)->save($path);
                $namef=$filename;
            }
            else
            {
                $namef="";
            }
            $data = $request->all();
            $name=$data['name'];
            $service=$data['service'];
            $subservice=$data['subservice'];

            DB::insert('insert into subsuperservice (subsupername, service, subservice, supersubimage) values (?, ?,? ,?)', [$name,$service,$subservice,$namef]);
            $url1= 'admin/supersubservices';
            return redirect($url1)->with('success', 'Super Sub service has been created');

        }







    }
}
