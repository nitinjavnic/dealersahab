
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

				<div class="col-md-3 paddingoff">
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

				<div class="col-md-6 paddingoff">
					<input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder="What service do you need?">
				</div>
				<div class="col-md-3 paddingoff">
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
	<div class="clearfix"></div>
	<?php foreach($subsearches as $shop){

		//print_r($shop);
	?>


	<div class="col-md-3">
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
	<div class="clearfix"></div>
		<div class="col-md-3 border">
			<form action="" method="" class="pl-10">
				<input type="checkbox" name="manufacturer" ><strong>Manufacturer</strong><br>
				<input type="checkbox" name="dealer" ><strong>Dealer</strong><br>
				<input type="checkbox" name="trader" ><strong>Trader/Wholesaler</strong><br>
				<input type="checkbox" name="trader" ><strong>Supplier/Distributor</strong><br><br>




				<label class="pl-50"for="category">Category<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label class="pl-50" for="category">SubCategory<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label  class="pl-50"for="category">SuperSubCategory<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label  class="pl-50"for="category">Brand Name<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label class="pl-50"for="category">State<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label class="pl-50" for="category">City<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>

				<label class="pl-50" for="category">Locality<br>
					<select>
						<option value="">abc</option>
						<option value="">123</option>
						<option value="">456</option>
						<option value="">789</option>
					</select></label><br><br>
			</form>
		</div>

		<div class="col-md-9">


			<div class="row">
				<?php if(!empty($sub_value)){?>

				<?php foreach($subsearches as $shop){

				?>
				<div class="col-md-7 company-info">


					<?php
					$shopphoto="/shop/";
					$npaths ='/local/images'.$shopphoto.$shop->profile_photo;
					?>


					<img src="<?php echo $url.$npaths;?>" alt="" >
					<a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>"><h3><strong><?php echo $shop->shop_name; ?></strong></h3></a>
						<p>Location-<?php echo $shop->address; ?><span class="pl-10">250 Profile Views</span></p>
					<p>  Nature of Business-Dealer</p>
					<p>Product Dealing-Compressor,Piston,Tools</p>
					<p> Brand Company-Usha,Algi,Shakti,Kirlooskar</p><br></div>
					<div class="col-md-5">
						<div class="well well-sm">
							<div class="row">
								<div class="col-xs-12 col-md-6 text-center">
									<h1 class="rating-num">
										<?php echo $shop->rating; ?>
									</h1>
									<div class="rating">

										<?php
										if($shop->rating=="")
										{
											$starpath = '/local/images/nostar.png';
										}
										else {
											$starpath = '/local/images/'.$shop->rating.'star.png';
										}
										?>
											<img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating=="")
											{
												echo "0";
											}
											else {
												echo $shop->rating;
											}
											?>
													stars" class="star_rates" />
									</div>
									<div>
										<span class="glyphicon glyphicon-user"></span>47 Rating
										<button type="button" class="btn btn-warning" name="submit">View Detail</button>
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="row rating-desc">
										<div class="col-xs-3 col-md-3 text-right">
											<span class="glyphicon glyphicon-star"></span><?php echo $shop->rating; ?>
										</div>
										<div class="col-xs-8 col-md-9">
											<div class="progress progress-striped">
												<?php

													if($shop->rating==5)
													{echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													 aria-valuemin="0" aria-valuemax="100" style="width: 100%">
													<span class="sr-only">80%</span>
												</div>';
													}
												if($shop->rating==4)
												{echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													 aria-valuemin="0" aria-valuemax="100" style="width: 80%">
													<span class="sr-only">80%</span>
												</div>';
												}
												if($shop->rating==3)
												{echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													 aria-valuemin="0" aria-valuemax="100" style="width: 60%">
													<span class="sr-only">80%</span>
												</div>';
												}

												if($shop->rating==2)
												{echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													 aria-valuemin="0" aria-valuemax="100" style="width: 40%">
													<span class="sr-only">80%</span>
												</div>';
												}
												if($shop->rating==1)
												{echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													 aria-valuemin="0" aria-valuemax="100" style="width: 10%">
													<span class="sr-only">80%</span>
												</div>';
												}
												?>


											</div>
										</div>

										<!-- end 1 -->
									</div>
									<!-- end row -->
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
</html>