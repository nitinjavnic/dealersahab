<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')



	<?php $google_id = 10;
	$google = DB::table('pages')
			->where('page_id', '=', $google_id)
			->get(); ?>



	<script type="text/javascript">

		<?php echo $google[0]->page_desc ?>;

	</script>

</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 fancy" align="center"><h2>PayPal Transaction Cancel</h2></div>
	<div class="container">
	 
	 <div class="height30"></div>
	 <div class="row">
	
	<div class="container text-center">
	<h2>Your PayPal transaction has been canceled.</h2>
    
	</div>
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>