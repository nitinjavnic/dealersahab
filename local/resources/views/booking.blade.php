<!DOCTYPE html>
<html lang="en">
<head>

	<?php

	$url = URL::to("/"); ?>

	@include('style')



	<script src="<?php echo $url;?>/js/jquery-ui.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->











<div class="clearfix"></div>





<div class="video">
	<div class="clearfix"></div>
	<div class="container">











		<div class="row profile shop">


			<div class="container">
				<div class="row">


					<div class="col-md-12">



						<div class="fb-profile">
							<?php
							$shopheader="/shop/";
							$path ='/local/images'.$shopheader.$shop[0]->cover_photo;
							if($shop[0]->cover_photo!=""){
							?>
							<img align="left" class="fb-image-lg" src="<?php echo $url.$path;?>" alt="cover banner"/>
							<?php } else { ?>
							<img align="left" class="fb-image-lg" src="<?php echo $url.'/local/images/no-image-big.jpg';?>" alt="cover banner"/>
							<?php } ?>

							<?php $shopphoto="/shop/";
							$paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
							if($shop[0]->profile_photo!=""){?>
							<img align="left" class="fb-image-profile thumbnail" src="<?php echo $url.$paths;?>" alt="Profile Photo"/>
							<?php } else { ?>
							<img align="left" class="fb-image-profile thumbnail customwidth" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
							<?php } ?>
							<div class="fb-profile-text">
								<h1><?php echo $shop[0]->shop_name;?></h1>
								<p><?php echo $shop[0]->address;?></p>
							</div>
						</div>










						<form class="" name="admin_s" id="formID" method="post" enctype="multipart/form-data" action="{{ route('booking') }}">

							{!! csrf_field() !!}

							<div class="container booking-main">
								<div class="col-md-4">
									<h5><strong>Choose A Service <span class="require">*</span></strong></h5>
									<?php
									foreach($seller_services as $viewservices)
									{

									?>
									<div class="col-md-6">
										<div class="booking list">

											<input type="checkbox" id="services[]" name="services[]" value="<?php echo $viewservices->subid; ?>" <?php if($subservice[0]->subid==$viewservices->subid) echo "checked"; ?> class="validate[required]">

											<label><?php echo $viewservices->subname; ?></label>
										</div>
									</div>

									<?php } ?>

								</div>



								<div class="col-md-8">

									<div class="col-md-12">


										<div class="col-md-4">
											<input type="hidden" id="booking_per_hour" name="booking_per_hour" value="<?php echo $booking_per_hour; ?>">
											<input type="hidden" id="start_time" name="start_time" value="<?php echo $start_time; ?>">
											<input type="hidden" id="end_time" name="end_time" value="<?php echo $end_time; ?>">


											<input type="hidden" id="shop_id" name="shop_id" value="<?php echo $shop_id; ?>">



											<input type="hidden" id="services_id" name="services_id" value="<?php echo $subservice[0]->subid; ?>">


											<h5><strong>Select Date <span class="require">*</span></strong></h5>

											<input type="date" class="form-control validate[required]" id="datepicker" name="datepicker" >
											<br/>
											<h5><strong>Address <span class="require">*</span></strong></h5>
											<input type="text" class="form-control validate[required]" id="book_address" name="book_address" >

										</div>



										<div class="col-md-4">
											<h5><strong>City <span class="require">*</span></strong></h5>
											<input type="text" class="form-control validate[required]" id="book_city" name="book_city" >

										</div>

										<div class="col-md-4">
											<h5><strong>Payment Mode <span class="require">*</span></strong></h5>
											<select id="payment_mode" name="payment_mode" class="form-control validate[required]">
												<option value="">None</option>


												<?php
												$set_id=1;
												$payssetting = DB::table('settings')->where('id', $set_id)->get();
												foreach($payssetting as $row)
												{
												$catid=$row->payment_option;
												$sel= explode(",",$catid);
												$lev= count($sel);
												for($i=0;$i<$lev;$i++)
												{
												$ad_cat= $sel[$i];

												?>
												<option value="<?php echo $ad_cat; ?>" ><?php echo $ad_cat; ?></option>
												<?php
												} }
												?>


											</select>

											<br/>
											<h5><strong>Pin Code <span class="require">*</span></strong></h5>
											<input type="number" class="form-control validate[required]" id="book_pincode" name="book_pincode" >

										</div>
										<div class="clearfix"></div>


										<div class="col-md-12">
											<h5><strong>Note </strong></h5>
											<textarea name="book_note" id="book_note" class="form-control"></textarea>
										</div>

										@if(Session::has('error'))

											<div class="alert alert-danger">

												{{ Session::get('error') }}

											</div>

										@endif


									</div>

								</div>



							</div>


							<?php if (Auth::guest()) {?>

							<div class="container">
								<h3 class="left">Create New Account</h3>
								<br/>
								<div class="form-group col-md-3">
									<label>Username <span class="require">*</span></label>
									<input type="text" id="name" name="name" class="form-control validate[required]">
									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>

								<div class="form-group col-md-3">
									<label>Email <span class="require">*</span></label>
									<input type="email" id="email" name="email" class="form-control validate[required,custom[email]]">
									@if ($errors->has('email'))
										<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>


								<div class="form-group col-md-3">
									<label>Phone No <span class="require">*</span></label>
									<input id="phoneno" type="text" class="form-control validate[required]" name="phoneno">
								</div>

								<div class="form-group col-md-3">
									<label>Password <span class="require">*</span></label>
									<input id="password" type="password" class="form-control validate[required]" name="password">
								</div>



								<div class="form-group col-md-3">
									<label>Gender <span class="require">*</span></label>
									<select name="gender" class="form-control validate[required]">

										<option value=""></option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>

								<div class="form-group col-md-3">
									<label>User Type <span class="require">*</span></label>
									<select name="usertype" class="form-control validate[required]">

										<option value=""></option>
										<option value="0">Customer</option>
										<option value="2">Seller</option>
									</select>
								</div>
								<?php } ?>
							</div>

							<div class="container">
								<div class="col-md-2">
									<input type="submit"  value="Submit" name="submit" class="booknow right">
								</div>
							</div>
						</form>















						<div class="form-group">
							<div class="row">
								<div class="col-md-12">

								</div>

							</div>
						</div>




					</div>
				</div>


			</div>












		</div>


















		<div class="height30"></div>
		<div class="row">





		</div>

	</div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
<?php if(session()->has('message')){?>
<script type="text/javascript">
	alert("<?php echo session()->get('message');?>");
</script>
</div>
<?php } ?>




</body>
</html>