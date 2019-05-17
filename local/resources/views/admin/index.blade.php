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
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count green"><?php echo $total_user;?></div>
              
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Manufacturer</span>
              <div class="count green"><?php echo $totalManufacturer;?></div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Dealer</span>
              <div class="count green"><?php echo $totalDealer;?></div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Wholesaler</span>
              <div class="count green"><?php echo $totalWholesaler;?></div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Total Distributer</span>
              <div class="count green"><?php echo $totalDistributer;?></div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Vendor</span>
              <div class="count"><?php echo $total_seller;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Customers</span>
              <div class="count"><?php echo $total_customer;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Total Booking</span>
              <div class="count"><?php echo $total_booking;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Today Booking</span>
              <div class="count"><?php echo $today_booking;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Shop</span>
              <div class="count"><?php echo $total_shop;?></div>
              
            </div>
          </div>
          <!-- /top tiles -->

		  <div style="clear:both;"></div>
		  <div class="row whitebg">
         <h3 class="report_title">Last 7 Days Booking Report</h3>
		 
		 
		 
		 <script type="text/javascript">
	window.onload = function () {
			var dps = [
		<?php echo $javas;?>
		];
		
		var chart = new CanvasJS.Chart("chartContainer",
		{
			
			 
			title:{
				//text: "Last 7 Days Order Report",
				fontSize:20,
				titleFontFamily: "Open Sans, sans-serif"
			},
			
                        animationEnabled: true,
			axisX:{

				gridColor: "Silver",
				tickColor: "silver"
				//valueFormatString: "DD/MMM"

			},                        
                        toolTip:{
                          shared:true
                        },
			theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{        
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Orders",
				markerType: "square",
				color: "#F08080",
				dataPoints: dps
			}			
			],
			axisX: {
        title: "Last 7 days",
       // titleFontFamily: "comic sans ms"
      },
			axisY: {
        title: "No of Booking",
        //titleFontFamily: "comic sans ms"
      },
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
		});

chart.render();
}
</script>



	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
		  
	</div>	  
		  
		  
		  
		  
		  <br/><br/>
		  
		  
		  
          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Recent Booking</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th>
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Booking Date</p>
                       </th>
					   <th>
                       
                          <p>Amount</p>
                       
                      </th>
					  
					  <th>
                       
                          <p>Status</p>
                       
                      </th>
                    </tr>
					
					<?php foreach($booking as $book){?>
					<tr height="20"></tr>
                    <tr>
                      <td>
                       <?php echo $book->name;?>
                      </td>
                      <td>
                       <?php echo $book->booking_date;?>
                      </td>
					  
					  <td>
                       <?php echo $book->total_amt.' '.$setting[0]->site_currency;?>
                      </td>
					  
					  <td>
                       <?php echo $book->status;?>
                      </td>
                    </tr>
					<?php } ?>
                  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

                </div>
              </div>
            </div>

            
			
			
			<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Latest Users</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
					<th>
                       
                          <p>Photo</p>
                       
                      </th>
					
                      <th>
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Phone</p>
                       </th>
					   <th>
                       
                          <p>User Type</p>
                       
                      </th>
					  
					  
                    </tr>
					
					<?php foreach($users as $user){
						$sta=$user->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; }
						?>
					<tr height="10"></tr>
                    <tr>
                      <?php 
					   $userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$user->photo;
						if($user->photo!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="40"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="40"></td>
						 <?php } ?>
                      <td>
                       <?php echo $user->name;?>
                      </td>
					  
					  <td>
                      <?php echo $user->phone;?>
                      </td>
					  
					  <td>
                       <?php echo $viewst;?>
                      </td>
                    </tr>
					<?php } ?>
                  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

                </div>
              </div>
            </div>

			
			

           
		   
		   
		   
		   
		   <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Top Testimonials</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
					<th style="width:25%">
                       
                          <p>Photo</p>
                       
                      </th>
					
                      <th style="width:25%">
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Description</p>
                       </th>
					   
					  
					  
                    </tr>
					
					<?php foreach($testimonials as $testimonial){
						?>
					<tr height="20"></tr>
                    <tr>
                      <?php 
					   $testimonialphoto="/testimonialphoto/";
						$path ='/local/images'.$testimonialphoto.$testimonial->image;
						if($testimonial->image!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="40"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="40"></td>
						 <?php } ?>
                      <td>
                       <?php echo $testimonial->name;?>
                      </td>
					  
					  <td>
                      <?php echo substr($testimonial->description,0,40);?>
                      </td>
					  
					  
                    </tr>
					<?php } ?>
                  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

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
