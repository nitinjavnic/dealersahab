<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        $query = DB::table('subservices')->select('subname','subid')->where('service', $id)->get();
        $data=array();
        foreach ($query as $viewsub) {

            $data[]=array('value'=>$viewsub->subname,'subid'=>$viewsub->subid);
        }

        if(count($data))
            return $data;
        else
            return ['error'=>'No Result Found'];

    }


    public function getallCategory(Request $request)
    {
        $data = $request->all();
        $id=$data['id'];
        $query = DB::table('subservices')->select('subname','subid')->where('service', $id)->get();
        $data=array();
        foreach ($query as $viewsub) {

            $data[]=array('value'=>$viewsub->subname,'subid'=>$viewsub->subid);
        }

        if(count($data))
            return $data;
        else
            return ['error'=>'No Result Found'];

    }

    public function getsuballCategory(Request $request)
    {
        $data = $request->all();
        $id=$data['id'];
        $query = DB::table('subsuperservice')->select('subsupername','id')->where('subservice', $id)->get();
        $data=array();
        foreach ($query as $viewsub) {

            $data[]=array('value'=>$viewsub->subsupername,'subid'=>$viewsub->id);
        }

        if(count($data))
            return $data;
        else
            return ['error'=>'No Result Found'];

    }



    public function getseller(Request $request)
    {

        $data = $request->all();
        $sellertype = $data['sellertype'];
        $query = DB::table('users')->select('id')->where('sellertype', $sellertype)->get();
        $databyshop = array();
        foreach ($query as $viewsub) {
            $shopdata = DB::table('shop')->where('user_id', $viewsub->id)->get();
            foreach ($shopdata as $allShop) {
                $databyshop[]=$allShop;
            }
        }
        return response()->json([
            'shop' => $databyshop,

        ]);

    }

    public function pinnedseller(Request $request)
    {
        $userId = Auth::user()->id;
        $input['shopname'] = Input::get('shopname');
        $rules = array('shopname' => 'unique:pinned,shop_name');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
            ]);
        } else {
            $data = $request->all();
            $shopUrl = $data['shopUrl'];
            $shopname = $data['shopname'];
            DB::insert('insert into pinned (url,shop_name,user_id) values (?, ?, ?)',
                [$shopUrl, $shopname,$userId]);
            return response()->json([
                'success' => 'true',

            ]);
        }
    }


}
