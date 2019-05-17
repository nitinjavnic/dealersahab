<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use URL;


class SuccessController extends Controller
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
    
	
	
	public function sangvish_success($cid) {
		
		
		 $booking = DB::table('booking')
              
			   ->where('book_id', '=', $cid)
			   
                ->get();
				
				
				
				
				
				
				
				
				
		
		 $bookingupdate = DB::table('booking')
						->where('book_id', '=', $cid)
						->update(['status' => 'paid']);
						
		 
		 
				
				
		$ser_id=$booking[0]->services_id;
			$sel=explode("," , $ser_id);
			$lev=count($sel);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$lev;$i++)
			{
				$id=$sel[$i];	
                
				
				
				$fet1 = DB::table('subservices')
								 ->where('subid', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->subname.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}
			
		$booking_time=$booking[0]->booking_time;
		if($booking_time>12)
		{
			$final_time=$booking_time-12;
			$final_time=$final_time."PM";
		}
		else
		{
			$final_time=$booking_time."AM";
		}		
			
         		
		$booking_id=$booking[0]->book_id;		
		$booking_date=$booking[0]->booking_date;
		$total_amt=$booking[0]->total_amt;
		$currency = $booking[0]->currency;
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		$user_email = $booking[0]->user_email;
		
		$viewuser = DB::table('users')
		 ->where('email', '=', $user_email)
		 ->get();
		
		$shopid=$booking[0]->shop_id;
		
		$shopdetails = DB::table('shop')
		 ->where('id', '=', $shopid)
		 ->get();
		 
		 $seller_email = $shopdetails[0]->seller_email;
		
		$usernamer = $viewuser[0]->name;
		$userphone = $viewuser[0]->phone;
		
		
		$data = [
            'booking_id' => $booking_id, 'ser_name' => $ser_name, 'booking_date' => $booking_date, 'final_time' => $final_time, 'total_amt' => $total_amt,
			 'currency' => $currency, 'site_logo' => $site_logo, 'site_name' => $site_name, 'user_email' => $user_email, 'usernamer' => $usernamer, 'userphone' => $userphone
        ];
		
		
		/* user email */
		
		Mail::send('paymentuseremail', $data , function ($message) use ($admin_email,$user_email)
        {
            $message->subject('Payment Details');
			
            $message->from($admin_email, 'Admin');

            $message->to($user_email);

        }); 
		
		/* end user email */
		
		
		/* admin email */
		
		Mail::send('paymentadminemail', $data , function ($message) use ($admin_email)
        {
            $message->subject('New Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		/* end admin email */
		
		
		/* seller email */
		
		
		Mail::send('paymentselleremail', $data , function ($message) use ($admin_email,$seller_email)
        {
            $message->subject('New Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($seller_email);

        }); 
		
		/* end seller email */
		
		
		
		
	 
	  $data = array('cid' => $cid);
     return view('success')->with($data);
	  
   }
   
   
   
  public function sangvish_payu_success($cid,$txtid)
  {
	  
	  
		$booking = DB::table('booking')
              
			   ->where('book_id', '=', $cid)
			   
                ->get();
				
				
				
				
				
				
				
				
				
		
		 $bookingupdate = DB::table('booking')
						->where('book_id', '=', $cid)
						->update(['status' => 'paid', 'payu_token' => $txtid]);
						
		 
		 
				
				
		$ser_id=$booking[0]->services_id;
			$sel=explode("," , $ser_id);
			$lev=count($sel);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$lev;$i++)
			{
				$id=$sel[$i];	
                
				
				
				$fet1 = DB::table('subservices')
								 ->where('subid', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->subname.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}
			
		$booking_time=$booking[0]->booking_time;
		if($booking_time>12)
		{
			$final_time=$booking_time-12;
			$final_time=$final_time."PM";
		}
		else
		{
			$final_time=$booking_time."AM";
		}		
			
         		
		$booking_id=$booking[0]->book_id;		
		$booking_date=$booking[0]->booking_date;
		$total_amt=$booking[0]->total_amt;
		$currency = $booking[0]->currency;
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		$user_email = $booking[0]->user_email;
		
		$viewuser = DB::table('users')
		 ->where('email', '=', $user_email)
		 ->get();
		
		$shopid=$booking[0]->shop_id;
		
		$shopdetails = DB::table('shop')
		 ->where('id', '=', $shopid)
		 ->get();
		 
		 $seller_email = $shopdetails[0]->seller_email;
		
		$usernamer = $viewuser[0]->name;
		$userphone = $viewuser[0]->phone;
		
		
		$data = [
            'booking_id' => $booking_id, 'ser_name' => $ser_name, 'booking_date' => $booking_date, 'final_time' => $final_time, 'total_amt' => $total_amt,
			 'currency' => $currency, 'site_logo' => $site_logo, 'site_name' => $site_name, 'user_email' => $user_email, 'usernamer' => $usernamer, 'userphone' => $userphone
        ];
		
		
		/* user email */
		
		Mail::send('paymentuseremail', $data , function ($message) use ($admin_email,$user_email)
        {
            $message->subject('Payment Details');
			
            $message->from($admin_email, 'Admin');

            $message->to($user_email);

        }); 
		
		/* end user email */
		
		
		/* admin email */
		
		Mail::send('paymentadminemail', $data , function ($message) use ($admin_email)
        {
            $message->subject('New Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		/* end admin email */
		
		
		/* seller email */
		
		
		Mail::send('paymentselleremail', $data , function ($message) use ($admin_email,$seller_email)
        {
            $message->subject('New Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($seller_email);

        }); 
		
		/* end seller email */
		
		
		
		
	 
	  
		
		$datas = array('cid' => $cid,'txtid' => $txtid);
     return view('payu_success')->with($datas);
		
	
  }	
	
	
	
	
	
	
	
}
