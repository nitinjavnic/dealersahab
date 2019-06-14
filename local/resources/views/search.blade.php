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

<?php $url = URL::to("/");?>

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
						<div class="col-md-3 col-xs-3 paddingoff">
							<input type="text" name="search_location" class="searchtext validate" id="search_text" placeholder="City">
						</div>
						<div class="col-md-6 col-xs-6 paddingoff">
							<input type="text" name="search_text" class="searchtext validate" id="search_text" placeholder="Enter Your Product ">
						</div>
						<div class="col-md-3 col-xs-3 paddingoff">
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


			<?php  if(empty($search_text) && empty($sub_value)) { ?>

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
							<div class="text-center">
								<label class="pl-50"for="category">
									<select class="selectindustry">
										<option value="">Select Industry</option>
										<?php foreach ($allservice as $myservices){ ?>

										<option value="<?php echo $myservices->id ?>"><?php echo $myservices->name ?></option>

										<?php }?>

									</select></label><br><br>

								<label class="pl-50" for="category">
									<select  class="subservice">
										<option value="">Select Sector</option>

									</select></label><br><br>

								<label  class="pl-50"for="category">
									<select  class="subsuperservice">
										<option value="">Select Product</option>
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
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-9">


					<div class="row"  id="test">
						<?php if(!empty($sub_value)){?>



						<?php foreach($subsearches as $shop){


						?>
						<div class="row review-point ">
							<div class="col-md-7 company-info ">

								<?php
								$shopphoto="/shop/";
								$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
								?>

								<img src="<?php echo $url.$npaths;?>" alt="" >
								<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>/<?php echo $shop->supersubcategory_id;?>"><h3><strong><?php echo $shop->shop_name; ?></strong></h3></a>
								<p><b>Address-</b> <?php echo $shop->address; ?><br><span><b>250 Profile Views</b></span></p>
								<p><b>  Nature of Business-</b> <?php echo $shop->sellertype; ?></p>
								<p><b>Product Dealing-</b> <?php echo $shop->product_dealing; ?></p>
								<p><b>Brand-</b> <?php echo $shop->brand_name; ?></p>
								<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>/<?php echo $shop->supersubcategory_id;?>" class="btn btn-warning">View Details</a>
							</div>
							<div class="col-md-5">
								<div class="well well-sm">
									<p style="float:left; font-weight: bold;">
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
									$rating_count = DB::table('rating')
											->where('rshop_id', '=', $shop->shop_id)
											->count();

									$var = 100;
									$var2 = $rating_count;

									if($var2 != 0)
									{
										$res = ( $var / $var2);
										$per = round($res, 1); // 66.7
									}




									$rating = DB::table('rating')
											->leftJoin('users', 'users.email', '=', 'rating.email')
											->where('rshop_id', '=', $shop->shop_id)
											->get();

									$items = array();
									$tyy = "";

									foreach ($rating as $ratingitmes){
										$items[] = $ratingitmes->rating;
										$totalrating = array_sum($items);
										$totalCount = count($rating);
										$sum = $totalrating/$totalCount;

										$tyy .= $totalrating/$totalCount;

										?>
                                <?php }?>

									<div class="rating" >
										<span><?php echo $tyy; ?></span><img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars" class="star_rates" />

									</div>


									<div class="row">
										<div class="col-md-5">
											<p style="float:left; font-weight: bold;">
												<span>Excelient</span>
												<?php
												if (in_array("5", $items))
												{
													echo "(1)";
												}
												else
												{
													echo "(0)";
												}

												?>


												&nbsp;&nbsp; </p>
										</div>
										<div class="col-md-7">
											<?php
											if (in_array("5", $items))
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating5 " role="progressbar" style="width:'.$per.'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}
											else
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating5 " role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}

											?>
										</div>
									</div>








									<div class="row">
										<div class="col-md-5">
											<p style="float:left; font-weight: bold;">
												<span>Good</span>
												<?php
												if (in_array("4", $items))
												{
													echo "(1)";
												}
												else
												{
													echo "(0)";
												}

												?>


												&nbsp;&nbsp; </p></div>

										<div class="col-md-7">
											<?php
											if (in_array("4", $items))
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating4" role="progressbar" style="width:'.$per.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}
											else
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating4" role="progressbar" style="width: 0" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}

											?>
										</div>
									</div>




									<div class="row">
										<div class="col-md-5">
											<p style="float:left; font-weight: bold;">
												<span>Average</span>
												<?php
												if (in_array("3", $items))
												{
													echo "(1)";
												}
												else
												{
													echo '(0)';
												}

												?>
												&nbsp;&nbsp; </p></div>

										<div class="col-md-7">
											<?php
											if (in_array("3", $items))
											{
												echo '	<div class="progress">
										<div class="progress-bar bg-rating3" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}
											else
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating3" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}

											?>
										</div>
									</div>







									<div class="row">
										<div class="col-md-5">
											<p style="float:left; font-weight: bold;">
												<span>bad</span>
												<?php
												if (in_array("2", $items))
												{
													echo "(1)";
												}
												else
												{
													echo "(0)";
												}

												?>
												&nbsp;&nbsp; </p>
										</div>

										<div class="col-md-7">

											<?php
											if (in_array("2", $items))
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating2" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}
											else
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating2" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}

											?>
										</div>
									</div>



									<div class="row">
										<div class="col-md-5">
											<p style="float:left; font-weight: bold;">
												<span>Very Bad</span>
												<?php

												if (in_array("1", $items))
												{
													echo "(1)";
												}
												else
												{
													echo "(0)";
												}


												?>

												&nbsp;&nbsp; </p>
										</div>


										<div class="col-md-7">
											<?php

											if (in_array("1", $items))
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating1" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}
											else
											{
												echo '<div class="progress">
										<div class="progress-bar bg-rating1" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
											}


											?>
										</div>
									</div>



								</div>

							</div>
						</div>
						<?php } ?>

						<?php } ?>&nbsp;&nbsp;
					</div>
					<div class="text-center mb-10">

					</div>

					<hr>

				</div>



			</div>


		</div>


	</div>




</div>

</div>
{{--
<div class="container" style="text-align:right;">
	@foreach ($subsearches as $shop)

	@endforeach

	{{ $subsearches->links() }}

</div>
--}}

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
					$('#test').html(data);


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

					$('#test').html(data);
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
						$('#test').html(data);

					});

				}


			});
		}

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
					$('#test').html(data);

				}


			});
		}

	});



	jQuery(document).ready(function(){
		srcurl = "{{ route('getallCategory') }}";
		$(".selectindustry").change(function() {

			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: srcurl,
				data: {
					id : id
				},
				success: function(data) {
					if(data.error=='No Result Found'){
						$(".subservice").append("<option>" + 'No Result Found' + "</option>");
					}else {
						$.each(data, function (index,value) {

							$(".subservice").append("<option value="+ value.subid +">" + value.value + "</option>");

						});
					}
				}


			});
		});
	});


	$(".selectindustry").change(function() {
		src = "{{ route('filter') }}";
		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);
				src = "{{ route('getsuballCategory') }}";
				$(".subservice").change(function() {
					var id = $(this).val();
					$.ajax({
						type: 'GET',
						url: src,
						data: {
							id : id
						},
						success: function(data) {
							if(data.error=='No Result Found'){
								$(".subsuperservice").append("<option>" + 'No Result Found' + "</option>");
							}else {
								$.each(data, function (index,value) {

									$(".subsuperservice").append("<option value="+ value.subid +">" + value.value + "</option>");

								});
							}
						}


					});
				});
			}

		});
	});











	$(".supercategory").change(function() {
		src = "{{ route('supercategoryfilter') }}";
		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);


			}


		});
	});


	$(".prductbrand").change(function() {
		src = "{{ route('brandProduct') }}";
		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);

			}


		});
	});



	$(".productstate").change(function() {
		src = "{{ route('productstate') }}";
		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);

			}


		});
	});


	$(".productcity").change(function() {
		src = "{{ route('productcity') }}";

		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);

			}


		});
	});




	$(".shoppincode").change(function() {
		src = "{{ route('shoppincode') }}";
		var id = $(this).val();
		$.ajax({
			type: 'GET',
			url: src,
			data: {
				id : id
			},
			success: function(data) {
				$('#test').html(data);

			}


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