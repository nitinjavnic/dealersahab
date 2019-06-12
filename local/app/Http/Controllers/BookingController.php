<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Responsive\Http\Requests;
use Responsive\User;

use Mail;
use Auth;

class BookingController extends Controller
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
    
	
	
	public function sangvish_showpage($shop_id,$product_id,$userid) {

        print_r($product_id);


        $uber = DB::table('users')->where('id', '=', $userid)->get();



		 $user_email = $uber[0]->email;
		 $products=DB::table('products')->where('id', '=', $product_id)->get();
		  $shop = DB::table('shop')
               ->where('id', '=', $shop_id)
                ->get();

		  $shop_id = $shop[0]->id;
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();


	  $data = array( 'shop' => $shop, 'user_email'=>$user_email,  'setting' => $setting,'products' => $products,
	   'shop_id' => $shop_id, 'userid' => $userid);
      return view('booking')->with($data);
   }













    public function viewbook()
   {
	   return view('booking_info');
	   
   }
   
   
	
	public function sangvish_savedata(Request $request) {

        $data = $request->all();
		$book_address=$data['book_address'];
		$user_email=$data['user_email'];
		$qty=$data['qty'];
		$product_id=$data['product_id'];
		$price=$data['price'];
		$book_city=$data['book_city'];
		$book_pincode=$data['book_pincode'];
		$book_note = $data['book_note'];
		$payment_mode = $data['payment_mode'];
		$status = 'Paid';
        $cur_date=date("Y-m-d");
        $token=$data['_token'];
        $shop_id=$data['shop_id'];
        $idd = Auth::user()->id;

        DB::insert('insert into booking (booking_address,booking_city,booking_pincode,booking_note,payment_mode,status,shop_id,total_amt,booking_date,token,user_id,services_id,user_email,qty) 
        values (?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)', [$book_address,$book_city,$book_pincode,$book_note,$payment_mode,$status,$shop_id,$price,$cur_date,$token,$idd,$product_id,$user_email,$qty]);


        return redirect()->back()->with('message', 'Booking Successfully!');



    }

				 
		
		

	
}
