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
                    <h2>Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				  <div align="right">
				  <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add User</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/adduser" class="btn btn-primary">Add User</a>
				  <?php } ?>
				  
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  <th>Photo</th>
                          <th>Username</th>
                          <th>Email</th>
						  <th>Phone</th>

                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($users as $user) { $sta=$user->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; }?>
    
						
                        <tr>
						 <td><?php echo $i;?></td>
						 <?php 
					   $userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$user->photo;
						if($user->photo!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="70"></td>
						 <?php } ?>
                          <td><?php echo $user->name;?></td>
                          <td><?php echo $user->email;?></td>
						  <td><?php echo $user->phone;?></td>

						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/edituser/{{ $user->id }}" class="btn btn-success">Edit</a>
						  <a href="<?php echo $url;?>/admin/email/{{ $user->id }}" class="btn btn-info">SendEmail</a>
				  <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  @if($sta!=1)<a href="<?php echo $url;?>/admin/users/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a> @endif

				  <?php } ?>
						  </td>
                        </tr>
                        <?php $i++; } ?>
                       
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
