<?php
/*if (Auth::check())
{
	
}
else
{
	//redirect()->route('login');
	
	echo Redirect::to('login');
}*/
?>   
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')

	<?php $google_id = 10;
	$google = DB::table('pages')
			->where('page_id', '=', $google_id)
			->get(); ?>



	<script type="text/javascript">

		<?php echo $google[0]->page_desc ?>;

	</script>



</head>
<body>
<?php $url = URL::to("/"); ?>
    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
			<div class="">
			<div class="col-md-12 fancy" align="center"><h2 >My Orders</h2></div>
		</div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	
	
	<?php 
	
	if($count==0){?>
	 <div class="err-msg" align="center">No order found!</div>
	<?php }  else { ?>
	<div class="col-md-12 service_style">
	 <div class="table-responsive">
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Sno</th>
					<th>Business Name</th>
					 <th>Product Name</th>
					 <th>Booking date</th>
					 <th>Quantity</th>
					 <th>Address</th>
					 <th>Booking Note</th>
					 <th>Booked By</th>
					 <th>Email</th>
					 <th>Phone No</th>
					 <th>Total Amount</th>
					 <th>Status</th>
					 <?php /* ?><th>Action</th><?php */?>
					 
                </tr>
            </thead>
			<tbody>	

	       <?php 
					  $sno=0;
					  foreach ($booking as $viewbook) {
						  $sno++;

					$ser_id=$viewbook->services_id;
			$sel=explode("," , $ser_id);
			$lev=count($sel);
			$ser_name="";
			$sum="";
			$price="";		
		for($i=0;$i<$lev;$i++)
			{
				$id=$sel[$i];	
                
				
				
				$fet1 = DB::table('products')
								 ->where('id', '=', $id)
								 ->get();
				$ser_name.=$fet1[0]->product_name.'<br>';
				$ser_name.=",";				 
				
				
				
				$ser_name=trim($ser_name,",");
				
			}		
			
			$bookid= $viewbook->book_id;
			$newbook = DB::table('booking')
								 ->where('book_id', '=', $bookid)
								 ->get();
								 
				$userdetail = DB::table('users')
                ->where('id', '=', $newbook[0]->user_id)
                ->get();				

					  ?>
    		
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $viewbook->shop_name;?></td>
				<td><?php echo $ser_name;?></td>
				<td><?php echo $viewbook->booking_date;?></td>
				<td><?php echo $viewbook->qty;?></td>
				<td><?php echo $viewbook->booking_address;?></td>
				<td><?php echo $viewbook->booking_note;?></td>
				<td><?php echo $userdetail[0]->name;?></td>
				<td><?php echo $viewbook->user_email;?></td>
				<td><?php echo $userdetail[0]->phone;?></td>
				<td><?php echo $viewbook->total_amt.' '.$setting[0]->site_currency;?></td>
				<?php if($newbook[0]->status=="pending"){ $color="#F31C0A"; } else if($newbook[0]->status=="paid")  { $color="#0DE50D"; }
				else if($newbook[0]->status=="failed")  { $color="#FB8C00"; } else { $color="#F31C0A"; }
				?> 
			    <td style="color:<?php echo $color;?>;"><?php echo $newbook[0]->status;?></td>
				
				
				 <?php /* ?><td>
				 <?php if(config('global.demosite')=="yes"){?>
				 <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a><span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				 <?php } else {?>
				 
				 
				 <a href="<?php echo $url;?>/myorder/<?php echo $viewbook->book_id;?>" onclick="return confirm('Are you sure you want to delete this?')">
				 <img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a>
				 <?php } ?>
				 </td><?php */?>

			</tr>
			 <?php } ?>
			</tbody>
															
            </table>
			</div>
	</div>
	<?php } ?> 
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>