<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use URL;
use Stripe;
use Stripe_Charge;

class StripeController extends Controller
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
    
	
	
	
   
   
   
  
	
	public function sangvish_stripe(Request $request) 
	{
		$data = $request->all();
		$cid = $data['cid'];
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		if($setts[0]->stripe_mode=="test") 
		{
			$secretkey = $setts[0]->test_secret_key;
		}
		else if($setts[0]->stripe_mode=="live")
		{
			$secretkey = $setts[0]->live_secret_key;
		}
		
		try {	
		
		include(app_path() . '/Stripe/lib/Stripe.php');
		Stripe::setApiKey($secretkey); //Replace with your Secret Key
		
		$charge = Stripe_Charge::create(array(
			"amount" => $_POST['amount'],
			"currency" => $_POST['currency_code'],
			"card" => $_POST['stripeToken'],
			"description" => $_POST['item_name']
		));
		
		
		
		$stripe_token = $_POST['stripeToken'];
		}

		catch(Stripe_CardError $e) {
			
		}



		catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API

		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)

		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		} catch (Stripe_Error $e) {

		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		} catch (Exception $e) {

		  // Something else happened, completely unrelated to Stripe
		}
		
		
		
		
		
		
		
		
		$booking = DB::table('booking')
              
			   ->where('book_id', '=', $cid)
			   
                ->get();
				
				
				
				
				
				
				
				
				
		
		 $bookingupdate = DB::table('booking')
						->where('book_id', '=', $cid)
						->update(['status' => 'paid', 'stripe_token' => $stripe_token]);
						
		 
		 
				
				
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
		
		
		
		
		
		$data = array('stripe_token' => $stripe_token);
		return view('stripe-success')->with($data);
		
	}
	
	
	
	
	
	
	
	
}
