<!DOCTYPE html>
<html lang="en">
<head>

   

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>


		<div class="">
			<div class="col-md-12 fancy" align="center"><h2 >Dashboard</h2></div>
		</div>
		<div class="clearfix"></div>
	<div class="container">
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    <div class="row profile">
		<div class="col-md-3 ">

		</div>
		<div class="col-md-6 moves20">
            <div class="border-shadow">

			   
			   @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
			   <div class="row">
				   <div class="col-md-6">
					   <div class="clearfix"></div>
					   <div class="profile-userpic">
						   <?php
						   $url = URL::to("/");
						   $userphoto="/userphoto/";
						   $path ='/local/images'.$userphoto.$editprofile[0]->photo;
						   if($editprofile[0]->photo!=""){?>
						   <img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
						   <?php } else { ?>
						   <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive" alt="">
						   <?php } ?>
					   </div>
				   </div>
				   <div class="col-md-6">
					   <div class="clearfix"></div>
					   <div class="profile-usertitle">
						   <div class="profile-usertitle-name">
							   <?php echo $editprofile[0]->name;?>
						   </div>
						   <?php $sta=$editprofile[0]->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; } ?>
						   <div class="profile-usertitle-job">
							   User Type : <?php echo $viewst;?>
						   </div>
					   </div>

					   <div class="profile-userbuttons">
						   <a href="<?php echo $url;?>/my_bookings" class="btn btn-success btn-sm">My Bookings</a>
						   <?php /* ?><a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Sign Out</a><?php */?>

					   </div>

				   </div>

			   </div>

			   <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class="col-md-12">
								<label for="name">Username</label>
                                <input id="name" type="text" class="form-control validate[required] text-input" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-12">
								<label for="email">E-Mail Address</label>
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input" name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="col-md-12">
								<label for="password">Password</label>
                                <input id="password" type="password" class="form-control"  name="password" value="">

                                
                            </div>
                        </div>

                        
						
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						 <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						 <div class="form-group">


                            <div class="col-md-12">
								<label for="phoneno" >Phone No</label>
                                <input id="phone" type="text" class="form-control validate[required] text-input" value="<?php echo $editprofile[0]->phone;?>" name="phone">
                            </div>
                        </div>
						
						
						
						<div class="form-group">


                            <div class="col-md-12">
								<label for="gender">Gender</label>
							<select name="gender" class="form-control validate[required] text-input">
							  
							  <option value=""></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
							</select>
                               
                            </div>
                        </div>
						
						
						
						
						<div class="form-group">


                            <div class="col-md-12">
								<label for="phoneno" >Photo</label>
                                <input type="file" id="photo" name="photo" class="form-control">
								@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
						

                        <div class="form-group">
                            <div class="col-md-12 ">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
				
				
			   
			   
			   
			   
			   
            </div>
		</div>

		<div class="col-md-3"></div>
	</div>


	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	</div>


	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#becomeseller').on('click', function() {
				src = "{{ route('becomeseller') }}";
				var userId = $(this).attr("data");
				var value = '2';
				$.ajax({
					type: 'GET',
					url: src,
					data: {
						id : userId,
						value : value,
					},
					success: function(data) {
						console.log(data);if(data.success==='false'){

							swal("You are already become a seller!");

						}else if(data.success==='true'){
							swal("Thanks! Now you are become a Seller");


						}
					}
				});

			});
		});

	</script>

</body>


</html>