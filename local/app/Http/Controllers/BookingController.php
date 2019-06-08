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
		 $uber = DB::table('users')->where('id', '=', $userid)->get();
		 $user_email = $uber[0]->email;
		 $products=DB::table('products')->where('id', '=', $product_id)->get();
		  $shop = DB::table('shop')
               ->where('id', '=', $shop_id)
                ->get();
		 $seller_services=DB::table('seller_services')
		 ->leftJoin('subservices', 'subservices.subid', '=', 'seller_services.subservice_id')
		 ->where('seller_services.user_id', '=', $userid)->get();

		  $shop_id = $shop[0]->id;
		$booking_days=$shop[0]->booking_opening_days;
		$booking_per_hour=$shop[0]->booking_per_hour;
		$cur_date=date("Y-m-d");
		$exp_date=date("Y-m-d",strtotime($cur_date.'+'.$booking_days.'days'));
		$start_time=$shop[0]->start_time;
		$end_time=$shop[0]->end_time;
		$shop_days=$shop[0]->shop_date;
		$days="";
		$sel=explode("," , $shop_days);
		$lev=count($sel);
		for($i=0;$i<$lev;$i++)
		{
			$date_id=$sel[$i];
			$days.="day==".$date_id;
			$days.="||";		
		}
		 $days=trim($days,"||");
		
		

		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		

	  $data = array( 'shop' => $shop, 'user_email'=>$user_email,  'setting' => $setting, 'seller_services' => $seller_services, 'products' => $products,
	  'booking_per_hour' => $booking_per_hour, 'start_time' => $start_time, 'end_time' => $end_time, 'shop_id' => $shop_id, 'userid' => $userid,
	  'days' => $days, 'exp_date' => $exp_date);
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
