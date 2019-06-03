<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use Image;
use Mail;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function sangvish_editshop(Request $request)
    {
        $subservices = DB::table('subservices')->select('subname','subid')->get();
        $service = DB::table('services')->select('name','id')->get();
        $subsuperservice = DB::table('subsuperservice')->select('subsupername','id')->get();
        $data =array('subservices'=>$subservices,'service'=>$service,'subsuperservice'=>$subsuperservice);
        return view('business')->with($data);
    }


    protected function sangvish_savedata(Request $request)
    {
        $data = $request->all();

            $shop_profile_photo = Input::file('shop_logo');
            if($shop_profile_photo!="")
            {
                $shopro="/shop/";
                $delpaths = base_path('images'.$shopro.$data['shop_logo']);
                $profilename  = time() . '.' . $shop_profile_photo->getClientOriginalExtension();
                $shopphoto="/shop/";
                $paths = base_path('images'.$shopphoto.$profilename);
                Image::make($shop_profile_photo->getRealPath())->resize(150, 150)->save($paths);
                $namepro=$profilename;
            }
                else
                {
                    $namepro="";
                }
            $nature=$data['nature'];
            $legal=$data['legal'];
            $service=$data['service'];
            $subservice=$data['subservice'];
            $superSubservice=$data['superSubservice'];
            $shop=$data['businessName'];
            $establishment=$data['establishment'];
            $gst=$data['gst'];
            $user_id = Auth::user()->id;


        DB::insert('insert into shop (shop_name,legal_status,category,sub_category,super_category,nature_of_business,establishment,gst_number,profile_photo,user_id) values (?, ?, ? , ?, ?, ?, ?, ?, ?,?)',
            [$shop,$legal,$service,$subservice,$superSubservice,$nature,$establishment,$gst,$namepro,$user_id]);
             return back()->with('success', 'Business has been created');

    }

}
