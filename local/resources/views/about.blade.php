<!DOCTYPE html>
<html lang="en">
<head>



	@include('style')


	<?php $google_id = 10;
	$google = DB::table('pages')
			->where('page_id', '=', $google_id)
			->get(); ?>




		<?php
	$FileName = str_replace("'", "", $google[0]->page_desc);
	echo $FileName; ?>



</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->



<div class="clearfix"></div>


<?php $url = URL::to("/"); ?>

<div class="video">
	<div class="clearfix"></div>
	<div class="">
		<div class="col-md-12 fancy" align="center"><h2 >About Us</h2></div>
	</div>
</div>

<div class="clearfix"></div>
<div class="clearfix"></div>

<div class="container">
	<div class="row">
		<div class="col-md-6" align="justify">
			<p>
				<?php

				echo $about[0]->page_desc;
				?>

			</p>
		</div>
		<div class="col-md-6 img-fluid">

			<?php
			$servicephoto="/Aboutus/";
			$path ='/local/images'.$servicephoto.$about[0]->photo;
			if($about[0]->photo!=""){
			?>
			<div class="item form-group" align="center">

					<img src="<?php echo $url.$path;?>" class="img-fluid"  width="100%" height="400px">

			</div>
			<?php } else { ?>
			<div class="item form-group" align="center">

					<img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-fluid" width="100%" width="100%" height="400px">

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