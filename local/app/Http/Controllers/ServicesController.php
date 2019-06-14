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

class ServicesController extends Controller
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
            ->paginate(2);
        $editid="";
		
		
		$data = array('services' => $services, 'setting' => $setting, 'shopview' => $shopview, 'uuid' => $uuid, 'viewservice' => $viewservice, 'editid' => $editid);

        return view('services')->with($data); 
		  
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



       $image = Input::file('Brochure');
       if($image!="")
       {
           $filename  = time() . '.' . $image->getClientOriginalExtension();
           $userphoto="/Brochure/";
           $path = base_path('images'.$userphoto.$filename);
           $destinationPath=base_path('images'.$userphoto);
           Image::make($image->getRealPath())->resize(300, 300)->save($path);
           $brochure=$filename;
       }
       else
       {
           $brochure="";
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
	   $comapanyname=$data['comapanyname'];
	   $productdesc=$data['productdesc'];
	   $productfeature=$data['productfeature'];
       $servi_id=DB::table('subservices')->where('subid', $subservice)->get();
       $service_id = $servi_id[0]->service;
       $servicecnt = DB::table('seller_services')
           ->where('user_id', '=', $user_id)
           ->where('shop_id', '=', $shop_id)
           ->where('subservice_id', '=', $subservice)
           ->count();




	   if($editid=="")
	   {

           if($servicecnt==0)

           {
               DB::insert('insert into seller_services (service_id,subservice_id,price,user_id,shop_id) values (?, ?, ?, ?, ?)', [$service_id,$subservice,$price,$user_id,$shop_id]);
               DB::insert('insert into products (user_id,shop_id,price,product_name,category_id,subcategory_id,supersubcategory_id,photo,comapanyname,productdesc,productfeature,brochure) 
                   values (?, ?, ?, ?, ?, ? ,?, ?,?,?,?,?)', [$user_id,$shop_id,$price,$productname,$service,$subservice,$supersubservice,$namef,$comapanyname,$productdesc,$productfeature,$brochure]);
               return back()->with('success', 'Products has been added');

           }
           else
           {
               return back()->with('error','That services is already added.');
           }


	   }
       else if($editid!="")
       {
		   DB::update('update products set user_id= "'.$user_id.'",price="'.$price.'",product_name= "'.$productname.'",subcategory_id="'.$subservice.'",supersubcategory_id="'.$supersubservice.'",photo="'.$namef.'",comapanyname="'.$comapanyname.'",productfeature="'.$productfeature.'",productdesc="'.$productdesc.'",brochure="'.$brochure.'",category_id="'.$service.'",product_name="'.$productname.'",shop_id="'.$shop_id.'" where id = ?', [$editid]);
			return back()->with('success', 'Products has been updated');
	   }		   
	   
   }
   
   
	
}