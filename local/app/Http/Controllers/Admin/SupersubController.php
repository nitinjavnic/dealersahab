<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SupersubController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $subservices = DB::table('subsuperservice')
            ->leftJoin('subservices', 'subid', '=', 'subsuperservice.subservice')
            ->orderBy('subsuperservice.id','desc')
            ->get();

        return view('admin.supersubservice', compact('subservices','services'));
    }

    public function getservice()
    {
        /* $getservice = DB::table('services')->where('id', '?')->first();
        return view('admin.subservices',$getservice);*/
    }


    public function destroy($id) {


        $image = DB::table('subsuperservice')->where('id', $id)->first();
        $orginalfile=$image->supersubimage;
        $userphoto="/supersubservicephoto/";
        $path = base_path('images'.$userphoto.$orginalfile);
        File::delete($path);
        DB::delete('delete from subsuperservice where id = ?',[$id]);

        return back();

    }

}