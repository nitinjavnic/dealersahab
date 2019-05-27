
<!DOCTYPE html>
<html lang="en">
<head>



   @include('style')

<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>



</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

	<div class="clearfix"></div>
	<div class="video">
	<div class="clearfix"></div>

	<div class="container">

	 <div class="height30"></div>
	<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<form action="{{ route('search') }}" method="post" enctype="multipart/form-data" id="formID">
			<div class="col-md-8">
				{!! csrf_field() !!}

				<div class="col-md-3 col-xs-4 paddingoff">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							location
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-xs-4 paddingoff">
					<input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder="Enter Your Product ">
				</div>
				<div class="col-md-3 col-xs-4 paddingoff">
					<input type="submit" name="search" class="searchbtn" value="Get Started">
				</div>


			</div>
		</form>
	</div>



	</div>

	</div>
	<div class="notopborder"></div>
	<div class="container">

	<div class="container">

	<?php if(!empty($search_text)){?>

	<?php if(!empty($count)){?>

	<div class="row">

	<?php foreach($subsearches as $shop){

		//print_r($shop);
	?>


	<div class="col-md-3 ">
		<div class="shop-list-page">
			<div class="shop_pic">
			<?php
					   $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop->cover_photo;
						if($shop->cover_photo!=""){
						?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.$paths;?>" class="img-responsive imgservice"></a>
						<?php } else { ?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.'/local/images/no-image-big.jpg';?>" class="img-responsive imgservice"></a>
						<?php } ?>
			</div>
			<div class="col-lg-12 imgthumb">
			<?php
						$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
						if($shop->profile_photo!=""){?>
        <img align="center" class="sthumb" src="<?php echo $url.$npaths;?>" alt="Profile Photo"/>
						<?php } else { ?>
						<img align="center" class="sthumb" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
						<?php } ?>
			</div>

			<?php
		if($shop->rating=="")
		{
			$starpath = '/local/images/nostar.png';
		}
		else {
		$starpath = '/local/images/'.$shop->rating.'star.png';
		}
		?>
			<div class="col-lg-12 shop_content">
				<h4 class="sv_shop_style"><a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><?php echo $shop->shop_name; ?></a></h4>

				<img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars" class="star_rates" />
				<h5><span class="lnr lnr-map-marker"></span>&nbsp;<?php echo $shop->city; ?></h5>

				<?php
					if($shop->start_time>12)
					{
						$start=$shop->start_time-12;
						$stime=$start."PM";
					}
					else
					{
						$stime=$shop->start_time."AM";
					}
					if($shop->end_time>12)
					{
						$end=$shop->end_time-12;
						$etime=$end."PM";
					}
					else
					{
						$etime=$shop->end_time."AM";
					}
				?>
				<h5><span class="lnr lnr-clock"></span>&nbsp; <?php echo $stime; ?> - <?php echo $etime; ?></h5>




				<div align="center"><a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" class="btn btn-success radiusoff">View Profile & Book</a></div>
			</div>


	    </div>
	</div>





	<?php } ?>
	</div>








	<?php } ?>






	<?php if(empty($count)){?>

	<div class="col-md-12 noservice" align="center">No services found!</div>

	<?php } ?>

	<?php } if(empty($search_text) && empty($sub_value)) { ?>

	<div class="row">
	<div class="clearfix"></div>
	<?php foreach($shopview as $shop){

	?>


	<div class="col-md-3">
		<div class="shop-list-page">
			<div class="shop_pic">
			<?php
					   $shopphoto="/shop/";
						$paths ='/local/images'.$shopphoto.$shop->cover_photo;
						if(!empty($shop->cover_photo)){
						?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.$paths;?>" class="img-responsive imgservice"></a>
						<?php } else { ?>
						<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><img src="<?php echo $url.'/local/images/no-image-big.jpg';?>" class="img-responsive imgservice"> </a>
						<?php } ?>
			</div>

			<div class="col-lg-12 imgthumb">
			<?php
						$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
						if(!empty($shop->profile_photo)){?>
        <img align="center" class="sthumb" src="<?php echo $url.$npaths;?>" alt="Profile Photo"/>
						<?php } else { ?>
						<img align="center" class="sthumb" src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="Profile Photo"/>
						<?php } ?>
			</div>



			<?php
		if($shop->rating=="")
		{
			$starpath = '/local/images/nostar.png';
		}
		else {
		$starpath = '/local/images/'.$shop->rating.'star.png';
		}
		?>
			<div class="col-lg-12 shop_content">
				<h4 class="sv_shop_style"><a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>" ><?php echo $shop->shop_name; ?></a></h4>
				<img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars" class="star_rates" />
				<h5><span class="lnr lnr-map-marker"></span>&nbsp;<?php echo $shop->city; ?></h5>

				<?php
					if($shop->start_time>12)
					{
						$start=$shop->start_time-12;
						$stime=$start."PM";
					}
					else
					{
						$stime=$shop->start_time."AM";
					}
					if($shop->end_time>12)
					{
						$end=$shop->end_time-12;
						$etime=$end."PM";
					}
					else
					{
						$etime=$shop->end_time."AM";
					}
				?>
				<h5><span class="lnr lnr-clock"></span>&nbsp; <?php echo $stime; ?> - <?php echo $etime; ?></h5>

				<div align="center"><a href="vendor/<?php echo $shop->name;?>" class="btn btn-success radiusoff">View Profile & Book</a></div>
			</div>


	    </div>
	</div>





	<?php } ?>
	</div>


	<?php } ?>



	<div class="row">

		<div class="col-md-3  filter-review1">
			<h3 class="text-center filter-heading">Filter Your Need</h3>
		<div class="filter-review">
			<form action="" method="" >
				<div class="pl-40 customerType">

						<label class="radio">
							<input type="radio" value="Manufacturer" id="Manufecturer" name="optradio">Manufecturer<br>
						</label>
						<label class="radio">
							<input type="radio" value="Dealer" id="Dealer" name="optradio">Franchises/Dealer
						</label>
						<label class="radio">
							<input type="radio" value="Wholesaler" id="Wholesaler" name="optradio">Wholesaler/Trader
						</label>

					<label class="radio">
						<input type="radio" value="Distributor" id="Distributor" name="optradio">Supplier/Distributor
					</label>
					<br>

				</div>
				<label class="pl-50"for="category">
					<select>
						<option value="">Select Industry</option>
						<?php foreach ($allservice as $allservice){ ?>

							<option value=""><?php echo $allservice->name ?></option>

						<?php }?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select>
						<option value="">Select Sector</option>
					<?php foreach ($allsubservice as $allsubservice ) {?>

							<option value=""><?php echo $allsubservice->subname ?></option>
						<?php } ?>


					</select></label><br><br>

				<label  class="pl-50"for="category">
					<select>
						<option value="">Select Product</option>

					<?php foreach ($allsuper as $allsuper){ ?>

						<option value=""><?php echo $allsuper->subsupername ?></option>
						<?php } ?>

					</select></label><br><br>

				<label  class="pl-50"for="category">
					<select>
						<option value="">Select Brand</option>
						<?php foreach ($brandname as $brandname){ ?>
						<option value=""><?php echo $brandname->comapanyname ?></option>

					<?php } ?>

					</select></label><br><br>
				<label class="pl-50"for="category">

					<select>
						<option value="">Select State</option>
						<?php foreach ($shopData as $state){?>
						<option value=""><?php echo $state->state ?></option>

					<?php } ?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select>
						<option value="">Select City</option>
						<?php foreach ($shopData as $city){?>
						<option value=""><?php echo $city->city ?></option>

						<?php } ?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select>
						<option value="">Select PinCode</option>
						<?php foreach ($shopData as $pincode){?>
						<option value=""><?php echo $pincode->pin_code ?></option>

						<?php } ?>

					</select></label><br><br>
				<input type="submit" class="btn btn-info filter-btn-go" value="Go"></input>
			</form>
		</div>
		</div>

		<div class="col-md-9 " id="test">


			<div class="row ">
				<?php if(!empty($sub_value)){?>

				<?php foreach($subsearches as $shop){


				?>
				<div class="row review-point m-0">
				<div class="col-md-7 company-info ">


					<?php
					$shopphoto="/shop/";
					$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
					?>


					<img src="<?php echo $url.$npaths;?>" alt="" >
					<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>"><h3><strong><?php echo $shop->shop_name; ?></strong></h3></a>
						<p><b>Address-</b> <?php echo $shop->address; ?><br><span>250 Profile Views</span></p>
						<p><b>  Nature of Business-</b> Dealer</p>
					<p><b>Product Dealing-</b> Compressor,Piston,Tools</p>
						<p> <b>Brand-</b> Usha,Algi,Shakti,Kirlooskar</p><br></div>
					<div class="col-md-5">
						<div class="well well-sm">
							<div class="row">
								<div class="col-xs-12 col-md-6 text-center">

								</div>
								<div class="col-xs-12 col-md-6">
									<div class="row rating-desc">
										


										<!-- end 1 -->
									</div>
									<!-- end row -->
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php } ?>

				<?php } ?>



			</div>

			<hr>

		</div>



	</div>



	</div>




	</div>

	</div>

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>

<script>
	$('.radio').on('click', function() {
		if ($("#Manufecturer").is(":checked")) {
			var Manufecturer = $("input[name='optradio']:checked").val();
			src = "{{ route('getseller') }}";
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					sellertype : Manufecturer
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						console.log(v);

						var shopName = v.shop_name;
						var address = v.address;


						$('#test').append('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-Dealer</p>\n' +
								'            <p>Product Dealing-Compressor,Piston,Tools</p>\n' +
								'            <p> Brand-Usha,Algi,Shakti,Kirlooskar</p><br></div>\n' +
								'        <div class="col-md-5">\n' +
								'            <div class="well well-sm">\n' +
								'                <div class="row">\n' +
								'                    <div class="col-xs-12 col-md-6 text-center">\n' +
								'                        <h1 class="rating-num">\n' +
								'                            3\t\t\t\t\t\t\t\t\t</h1>\n' +
								'                        <div class="rating">\n' +
								'\n' +
								'                            <img src="http://localhost/dealerSahab/local/images/3star.png" alt="rated 3\t\t\t\t\t\t\t\t\t\t\t\t\tstars" class="star_rates">\n' +
								'                        </div>\n' +
								'                        <div>\n' +
								'                            <span class="glyphicon glyphicon-user"></span>47 Rating\n' +
								'                            <button type="button" class="btn btn-warning" name="submit">View Detail</button>\n' +
								'                        </div>\n' +
								'                    </div>\n' +
								'                    <div class="col-xs-12 col-md-6">\n' +
								'                        <div class="row rating-desc">\n' +
								'                            <div class="col-xs-3 col-md-3 text-right">\n' +
								'                                <span class="glyphicon glyphicon-star"></span>3\t\t\t\t\t\t\t\t\t\t</div>\n' +
								'                            <div class="col-xs-8 col-md-9">\n' +
								'                                <div class="progress progress-striped">\n' +
								'                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">\n' +
								'                                        <span class="sr-only">80%</span>\n' +
								'                                    </div>\n' +
								'\n' +
								'                                </div>\n' +
								'                            </div>\n' +
								'\n' +
								'                            <!-- end 1 -->\n' +
								'                        </div>\n' +
								'                        <!-- end row -->\n' +
								'                    </div>\n' +
								'                </div>\n' +
								'            </div>\n' +
								'        </div></div>\n');

					});

				}


			});
		}
		if ($("#Dealer").is(":checked")) {
			var Dealer = $("input[name='optradio']:checked").val();

			src = "{{ route('getseller') }}";
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					sellertype : Dealer
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						console.log(v);

						var shopName = v.shop_name;
						var address = v.address;


						$('#test').append('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-Dealer</p>\n' +
								'            <p>Product Dealing-Compressor,Piston,Tools</p>\n' +
								'            <p> Brand-Usha,Algi,Shakti,Kirlooskar</p><br></div>\n' +
								'        <div class="col-md-5">\n' +
								'            <div class="well well-sm">\n' +
								'                <div class="row">\n' +
								'                    <div class="col-xs-12 col-md-6 text-center">\n' +
								'                        <h1 class="rating-num">\n' +
								'                            3\t\t\t\t\t\t\t\t\t</h1>\n' +
								'                        <div class="rating">\n' +
								'\n' +
								'                            <img src="http://localhost/dealerSahab/local/images/3star.png" alt="rated 3\t\t\t\t\t\t\t\t\t\t\t\t\tstars" class="star_rates">\n' +
								'                        </div>\n' +
								'                        <div>\n' +
								'                            <span class="glyphicon glyphicon-user"></span>47 Rating\n' +
								'                            <button type="button" class="btn btn-warning" name="submit">View Detail</button>\n' +
								'                        </div>\n' +
								'                    </div>\n' +
								'                    <div class="col-xs-12 col-md-6">\n' +
								'                        <div class="row rating-desc">\n' +
								'                            <div class="col-xs-3 col-md-3 text-right">\n' +
								'                                <span class="glyphicon glyphicon-star"></span>3\t\t\t\t\t\t\t\t\t\t</div>\n' +
								'                            <div class="col-xs-8 col-md-9">\n' +
								'                                <div class="progress progress-striped">\n' +
								'                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">\n' +
								'                                        <span class="sr-only">80%</span>\n' +
								'                                    </div>\n' +
								'\n' +
								'                                </div>\n' +
								'                            </div>\n' +
								'\n' +
								'                            <!-- end 1 -->\n' +
								'                        </div>\n' +
								'                        <!-- end row -->\n' +
								'                    </div>\n' +
								'                </div>\n' +
								'            </div>\n' +
								'        </div></div>\n');

					});

				}


			});

		}

		if ($("#Wholesaler").is(":checked")) {
			var Wholesaler = $("input[name='optradio']:checked").val();

			src = "{{ route('getseller') }}";
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					sellertype : Wholesaler
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						console.log(v);

						var shopName = v.shop_name;
						var address = v.address;


						$('#test').append('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-Dealer</p>\n' +
								'            <p>Product Dealing-Compressor,Piston,Tools</p>\n' +
								'            <p> Brand-Usha,Algi,Shakti,Kirlooskar</p><br></div>\n' +
								'        <div class="col-md-5">\n' +
								'            <div class="well well-sm">\n' +
								'                <div class="row">\n' +
								'                    <div class="col-xs-12 col-md-6 text-center">\n' +
								'                        <h1 class="rating-num">\n' +
								'                            3\t\t\t\t\t\t\t\t\t</h1>\n' +
								'                        <div class="rating">\n' +
								'\n' +
								'                            <img src="http://localhost/dealerSahab/local/images/3star.png" alt="rated 3\t\t\t\t\t\t\t\t\t\t\t\t\tstars" class="star_rates">\n' +
								'                        </div>\n' +
								'                        <div>\n' +
								'                            <span class="glyphicon glyphicon-user"></span>47 Rating\n' +
								'                            <button type="button" class="btn btn-warning" name="submit">View Detail</button>\n' +
								'                        </div>\n' +
								'                    </div>\n' +
								'                    <div class="col-xs-12 col-md-6">\n' +
								'                        <div class="row rating-desc">\n' +
								'                            <div class="col-xs-3 col-md-3 text-right">\n' +
								'                                <span class="glyphicon glyphicon-star"></span>3\t\t\t\t\t\t\t\t\t\t</div>\n' +
								'                            <div class="col-xs-8 col-md-9">\n' +
								'                                <div class="progress progress-striped">\n' +
								'                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">\n' +
								'                                        <span class="sr-only">80%</span>\n' +
								'                                    </div>\n' +
								'\n' +
								'                                </div>\n' +
								'                            </div>\n' +
								'\n' +
								'                            <!-- end 1 -->\n' +
								'                        </div>\n' +
								'                        <!-- end row -->\n' +
								'                    </div>\n' +
								'                </div>\n' +
								'            </div>\n' +
								'        </div></div>\n');

					});

				}


			});		}

		if ($("#Distributor").is(":checked")) {
			src = "{{ route('getseller') }}";
			var Distributor = $("input[name='optradio']:checked").val();

			$.ajax({
				type: 'GET',
				url: src,
				data: {
					sellertype : Distributor
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						console.log(v);

						var shopName = v.shop_name;
						var address = v.address;


						$('#test').append('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-Dealer</p>\n' +
								'            <p>Product Dealing-Compressor,Piston,Tools</p>\n' +
								'            <p> Brand-Usha,Algi,Shakti,Kirlooskar</p><br></div>\n' +
								'        <div class="col-md-5">\n' +
								'            <div class="well well-sm">\n' +
								'                <div class="row">\n' +
								'                    <div class="col-xs-12 col-md-6 text-center">\n' +
								'                        <h1 class="rating-num">\n' +
								'                            3\t\t\t\t\t\t\t\t\t</h1>\n' +
								'                        <div class="rating">\n' +
								'\n' +
								'                            <img src="http://localhost/dealerSahab/local/images/3star.png" alt="rated 3\t\t\t\t\t\t\t\t\t\t\t\t\tstars" class="star_rates">\n' +
								'                        </div>\n' +
								'                        <div>\n' +
								'                            <span class="glyphicon glyphicon-user"></span>47 Rating\n' +
								'                            <button type="button" class="btn btn-warning" name="submit">View Detail</button>\n' +
								'                        </div>\n' +
								'                    </div>\n' +
								'                    <div class="col-xs-12 col-md-6">\n' +
								'                        <div class="row rating-desc">\n' +
								'                            <div class="col-xs-3 col-md-3 text-right">\n' +
								'                                <span class="glyphicon glyphicon-star"></span>3\t\t\t\t\t\t\t\t\t\t</div>\n' +
								'                            <div class="col-xs-8 col-md-9">\n' +
								'                                <div class="progress progress-striped">\n' +
								'                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">\n' +
								'                                        <span class="sr-only">80%</span>\n' +
								'                                    </div>\n' +
								'\n' +
								'                                </div>\n' +
								'                            </div>\n' +
								'\n' +
								'                            <!-- end 1 -->\n' +
								'                        </div>\n' +
								'                        <!-- end row -->\n' +
								'                    </div>\n' +
								'                </div>\n' +
								'            </div>\n' +
								'        </div></div>\n');

					});

				}


			});		}


	});


</script>

</html>