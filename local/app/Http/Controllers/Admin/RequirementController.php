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

class RequirementController extends Controller
{
    public function index()
    {
        $services = DB::table('post')
            ->orderBy('id','desc')
            ->get();

        return view('admin.requirement', ['services' => $services]);
    }

    public function seller_req()
    {
        $seller_req = DB::table('contact_seller')
            ->orderBy('id','desc')
            ->get();

        return view('admin.seller_req', ['services' => $seller_req]);
    }

}
?>