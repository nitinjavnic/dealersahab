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
        if($sellertype==='Manufacturer'){

            $subsearches = DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                ->where('shop.sellertype', '=', $sellertype)
                ->groupBy('shop.id')
                ->get();
            return view('filter_data', ['subsearches' => $subsearches]);

        }

        if($sellertype==='Dealer'){
            $subsearches = DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                ->where('shop.sellertype', '=', $sellertype)
                ->groupBy('shop.id')
                ->get();
            return view('filter_data', ['subsearches' => $subsearches]);
        }

        if($sellertype==='Wholesaler'){
            $subsearches = DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                ->where('shop.sellertype', '=', $sellertype)
                ->groupBy('shop.id')
                ->get();
            return view('filter_data', ['subsearches' => $subsearches]);
        }


        if($sellertype==='Distributor'){
            $subsearches = DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                ->where('shop.sellertype', '=', $sellertype)
                ->groupBy('shop.id')
                ->get();
            return view('filter_data', ['subsearches' => $subsearches]);
        }


    }

    public function pinnedseller(Request $request)
    {
        $userId = Auth::user()->id;
        $input['shopname'] = Input::get('shopname');
        $rules = array('shopname' => 'unique:pinned,shop_name');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            DB::delete('delete from pinned where user_id = ?',[$userId]);
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

    public function becomeseller(Request $request){
           $data = $request->all();
        if (Auth::user()->id===$data['id']) {
            return response()->json([
                'success' => 'false',
            ]);
        } else {
            $data = $request->all();
            $id = $data['id'];
            $value=2;
            DB::update('update users set admin="'.$value.'" where id = ?', [$id]);

            return response()->json([
                'success' => 'true',

            ]);
        }
    }

    public function productCategory(Request $request){
        $data = $request->all();
        $subid = $data['subid'];
        $product = DB::table('products')
            ->where('supersubcategory_id', '=', $subid)
            ->get();
        $data=array();
        foreach ($product as $viewsub) {

            $data[]=array('value'=>$viewsub);
        }

        if(count($data))
            return $data;
        else
            return ['error'=>'No Result Found'];


    }


    public function filter(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.category', '=', $id)
            ->groupBy('shop.id')
            ->get();
            return view('filter_data', ['subsearches' => $subsearches]);
    }

    public function subcategoryfilter(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.sub_category', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);

    }

    public function supercategory(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.super_category', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);

    }

    public function brandProduct(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.brand_name', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);
    }

    public function productstate(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.state', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);
    }

    public function productcity(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.city', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);
    }

    public function shoppincode(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $subsearches = DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.pin_code', '=', $id)
            ->groupBy('shop.id')
            ->get();
        return view('filter_data', ['subsearches' => $subsearches]);
    }

    public function findRole(Request $request){
        $data =$request->all();
        $id = $data['id'];
        $product = DB::table('users')
            ->where('admin', '=', $id)
            ->get();
        $data=array();
        foreach ($product as $viewsub) {
            $data[]=array('value'=>$viewsub);
        }
        if(count($data))
            return $data;
        else
            return ['error'=>'No Result Found'];

    }

    public function productDetail($id){
        $randomProduct = DB::table('products')
            ->limit(4)
            ->get();

        $products = DB::table('products')->where('id', $id)->get();
        return view('productdetail', ['products' => $products,'randomProduct'=>$randomProduct]);

    }

    public function deleteContact($id){
        DB::delete('delete from contact_seller where user_id = ?',[$id]);
        return back();


    }

    public function sellerdata(Request $request){
        $data = $request->all();
        $user_id = $data['user_id'];
        $seller = DB::table('shop')
            ->where('user_id', '=', $user_id)
            ->get();

        return view('admin/sellerdetails', ['seller' => $seller]);
    }

    public function profileview(Request $request){
        $data= $request->all();
        print_r($data);

    }

}
