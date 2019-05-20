<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;

class GetsubserviceController extends Controller
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
    public function getsubservices(Request $request)
    {
       $data = $request->all();
        $id=$data['id'];
        $query = DB::table('subservices')->select('subname')->where('service', $id)->get();
        $data=array();
        foreach ($query as $viewsub) {
            $data[]=array('value'=>$viewsub->subname);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found'];

    }












}
