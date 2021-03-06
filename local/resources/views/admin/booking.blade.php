<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Featured History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  <th>Business Name</th>
                          <th>Booking Date</th>
						  
						  <th>User Phone No</th>
						  <th>Username</th>
                          <th>Email</th>
						  
						  <th>Address</th>
						  <th>City</th>
						  <th>Pincode</th>
						  
						  <th>Booking Note</th>
						  
						  <th>Vendor Amount</th>
						  <th>Admin Amount</th>
						  <th>Payment Mode</th>
						  
						   <th>Status</th>
						  
						  
						  <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sno=0;
					  foreach ($booking as $viewbook) {
						  $sno++;



			$bookid= $viewbook->book_id;
			$newbook = DB::table('booking')
								 ->where('book_id', '=', $bookid)
								 ->get();

					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>

                          <td><?php echo $viewbook->shop_name;?></td>

						   <td><?php echo $viewbook->booking_date;?></td>


						   <td><?php echo $viewbook->phone;?></td>

						   <td><?php echo $viewbook->name;?></td>

						   <td><?php echo $viewbook->user_email;?></td>

						   
						   <td><?php echo $viewbook->booking_address;?></td>
						   
						   <td><?php echo $viewbook->booking_city;?></td>
						   
						   <td><?php echo $viewbook->booking_pincode;?></td>
						   
						   <td><?php echo $viewbook->booking_note;?></td>
						   

						   <td><?php echo $viewbook->total_amt - $viewbook->admin_commission.' '.$setting[0]->site_currency;?></td>

						   <td><?php echo $viewbook->admin_commission.' '.$setting[0]->site_currency;?></td>

						   <td><?php echo $viewbook->payment_mode;?></td>
                            <?php $color = 'FB6704'; ?>

						   <?php if($newbook[0]->status=="pending"){ $color="#FB6704"; } else if($newbook[0]->status=="paid")  { $color="#0DE50D"; }?>
						   <td style="color:<?php echo $color;?>;"><?php echo $newbook[0]->status;?></td>

						  <td>
					<?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>	  
						 <a href="<?php echo $url;?>/admin/booking/{{ $viewbook->book_id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
				  <?php } ?>
						  
						  </td>
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
