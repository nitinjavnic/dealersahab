<?php

namespace Responsive\Http\Controllers;



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

class PinnedController extends Controller
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


    public function sangvish_index()
    {

        $pinned = DB::table('pinned')->get();
        $data = array('services' => $pinned);
        return view('pinned')->with($data);

    }


    public function sangvish_destroy($did) {


        DB::delete('delete from products where id = ?',[$did]);

        return redirect('services');

    }


    public function sangvish_editdata($id) {
        $services = DB::table('services')->orderBy('name', 'asc')->get();
        $set_id=1;
        $setting = DB::table('settings')->where('id', $set_id)->get();

        $uuid=Auth::user()->id;
        $uid=Auth::user()->email;

        $shopview = DB::table('shop')->where('seller_email', $uid)->get();

        $viewservice = DB::table('products')
            ->where('user_id', $uuid)
            ->orderBy('id','desc')
            ->leftJoin('subservices', 'subservices.subid', '=', 'products.subcategory_id')
            ->get();


        $sellservices = DB::select('select * from products where id = ?',[$id]);
        $editid=$id;

        $data = array('services' => $services, 'setting' => $setting, 'shopview' => $shopview, 'uuid' => $uuid, 'viewservice' => $viewservice , 'sellservices' => $sellservices,
            'editid' => $editid);

        return view('services')->with($data);
    }


    protected function sangvish_savedata(Request $request)
    {
        $this->validate($request, [
            'productname' => 'required',
            'service' => 'required',
            'subservice' => 'required',
            'supersubservice' => 'required',
        ]);

        $image = Input::file('photo');
        if($image!="")
        {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $userphoto="/productimage/";
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


        $service=$data['service'];
        $subservice=$data['subservice'];
        $supersubservice=$data['supersubservice'];
        $price=$data['price'];
        $productname=$data['productname'];
        $user_id=$data['user_id'];
        $shop_id=$data['shop_id'];
        $editid=$data['editid'];
        $servi_id=DB::table('subservices')->where('subid', $subservice)->get();
        $service_id = $servi_id[0]->service;

        $servicecnt = DB::table('products')
            ->where('user_id', '=', $user_id)
            ->where('shop_id', '=', $shop_id)
            ->where('subcategory_id', '=', $subservice)
            ->count();

        if($editid=="")
        {

            if($servicecnt==0)

            {

                DB::insert('insert into products (user_id,shop_id,price,product_name,category_id,subcategory_id,supersubcategory_id,photo) values (?, ?, ?, ?, ?, ? ,?, ?)', [$user_id,$shop_id,$price,$productname,$service,$subservice,$supersubservice,$namef]);

                return back()->with('success', 'Product has been added');
            }
            else
            {
                return back()->with('error','That services is already added.');
            }
        }
        else if($editid!="")
        {
            DB::update('update seller_services set service_id="'.$service_id.'",subservice_id="'.$subservice_id.'",price="'.$price.'",time="'.$time.'",shop_id="'.$shop_id.'" where id = ?', [$editid]);
            return back()->with('success', 'Services has been updated');
        }

    }



}