
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
					<input type="text" name="search_location" class="searchtext validate[required]" id="search_text" placeholder="City">
				</div>
				<div class="col-md-6 col-xs-4 paddingoff">
					<input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder="Enter Your Product ">
				</div>
				<div class="col-md-3 col-xs-4 paddingoff">
					<input type="submit" name="search" class="searchbtn" value="Search">
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
					<select class="selectindustry">
						<option value="">Select Industry</option>
						<?php foreach ($allservice as $myservices){ ?>

							<option value="<?php echo $myservices->id ?>"><?php echo $myservices->name ?></option>

						<?php }?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select class="selectsector">
						<option value="">Select Sector</option>
					<?php foreach ($services as $allsubservices ) {

						?>

							<option value="<?php echo $allsubservices->subid ?>"><?php echo $allsubservices->subname ?></option>
						<?php } ?>


					</select></label><br><br>

				<label  class="pl-50"for="category">
					<select class="supercategory">
						<option value="">Select Product</option>

					<?php foreach ($allsuper as $allsuper){ ?>

						<option value="<?php echo $allsuper->id ?>"><?php echo $allsuper->subsupername ?></option>
						<?php } ?>

					</select></label><br><br>

				<label  class="pl-50"for="category">
					<select class="prductbrand">
						<option value="">Select Brand</option>
						<?php foreach ($brandname as $brandname){ ?>
						<option value="<?php echo $brandname->shop_id?>"><?php echo $brandname->comapanyname ?></option>

					<?php } ?>

					</select></label><br><br>
				<label class="pl-50"for="category">

					<select class="productstate">
						<option value="">Select State</option>
						<?php foreach ($shopData as $state){?>
						<option value="<?php echo $state->state ?>"><?php echo $state->state ?></option>

					<?php } ?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select class="productcity">
						<option value="">Select City</option>
						<?php foreach ($shopData as $city){?>
						<option value="<?php echo $city->city ?>"><?php echo $city->city ?></option>

						<?php } ?>

					</select></label><br><br>

				<label class="pl-50" for="category">
					<select class="shoppincode">
						<option value="">Select PinCode</option>
						<?php foreach ($shopData as $pincode){?>
						<option value="<?php echo $pincode->pin_code ?>"><?php echo $pincode->pin_code ?></option>

						<?php } ?>

					</select></label><br><br>
				<input type="submit" class="btn btn-info filter-btn-go" value="Go"></input>
			</form>
		</div>
		</div>

		<div class="col-md-9">


			<div class="row"  id="test">
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
							<?php
							if($shop->rating=="")
							{
								$starpath = '/local/images/nostar.png';
							}
							else {
								$starpath = '/local/images/'.$shop->rating.'star.png';
							}
							?>

							<?php
							$rating = DB::table('rating')
									->leftJoin('users', 'users.email', '=', 'rating.email')
									->where('rshop_id', '=', $shop->shop_id)
									->get();
							$items = array();
							foreach ($rating as $ratingitmes){
								$items[] = $ratingitmes->rating;
								$totalrating = array_sum($items);
								$totalCount = count($rating);
								$sum = $totalrating/$totalCount;
								?>
                                <?php }?>

							<div class="rating" >
								<span><?php echo $sum ?></span><img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars" class="star_rates" />

							</div>


								<p style="float:left;">
									<?php

									if (in_array("1", $items))
									{
										echo "1";
									}
									else
									{
										echo "0";
									}


									?>

									&nbsp;&nbsp; </p>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p style="float:left;">
									<?php
									if (in_array("2", $items))
									{
										echo "1";
									}
									else
									{
										echo "0";
									}

									?>


									&nbsp;&nbsp; </p>
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p style="float:left;">

									<?php
									if (in_array("3", $items))
									{
										echo "1";
									}
									else
									{
										echo "0";
									}

									?>


									&nbsp;&nbsp; </p>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p style="float:left;">

									<?php
									if (in_array("4", $items))
									{
										echo "1";
									}
									else
									{
										echo "0";
									}

									?>


									&nbsp;&nbsp; </p>
								<div class="progress">
									<div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p style="float:left;">

									<?php
									if (in_array("5", $items))
									{
										echo "1";
									}
									else
									{
										echo "0";
									}

									?>


									&nbsp;&nbsp; </p>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
	<div class="container" style="text-align:right;">
		@foreach ($subsearches as $shop)

		@endforeach

	{{ $subsearches->links() }}

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
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;
						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src='+ image +' alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Manufecturer+'</p>\n' +
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
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;


						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src='+image+' alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Dealer+'</p>\n' +
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
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;



						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src='+image+' alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Wholesaler+'</p>\n' +
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

						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;



						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
	jQuery(document).ready(function(){
		src = "{{ route('filter') }}";
		$(".selectindustry").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('subcategoryfilter') }}";
		$(".selectsector").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('supercategoryfilter') }}";
		$(".supercategory").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {

					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('brandProduct') }}";
		$(".prductbrand").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('productstate') }}";
		$(".productstate").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('productcity') }}";
		$(".productcity").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});
	jQuery(document).ready(function(){
		src = "{{ route('shoppincode') }}";
		$(".shoppincode").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					$.each(data.shop, function(k, v) {
						let profileUrl = 'http://localhost/dealerSahab/local/images/shop/';
						var shopName = v.shop_name;
						var address = v.address;
						var profile_photo = v.profile_photo;
						var image = profileUrl + profile_photo;

						$('#test').prepend('<div class="row review-point m-0">\n' +
								'        <div class="col-md-7 company-info ">\n' +
								'            <img src="http://localhost/dealerSahab/local/images/shop/1496146095.jpg" alt="">\n' +
								'            <a href="http://localhost/dealerSahab/vendor/wpchecking"><h3><strong>'+shopName+'</strong></h3></a>\n' +
								'            <p>Address-42, '+ address +'<span class="pl-10">250 Profile Views</span></p>\n' +
								'            <p>  Nature of Business-'+Distributor+'</p>\n' +
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
		});
	});

	$(document).ready(function() {
		src = "{{ route('searchajax') }}";
		$("#search_text").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: src,
					dataType: "json",
					data: {
						term : request.term
					},
					success: function(data) {
						response(data);

					}
				});
			},
			minLength: 1,

		});
	});

	$(document).ready(function() {
		src = "{{ route('searchlocation') }}";
		$("#search_location").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: src,
					dataType: "json",
					data: {
						term : request.term
					},
					success: function(data) {
						response(data);

					}
				});
			},
			minLength: 1,

		});
	});








</script>

</html>