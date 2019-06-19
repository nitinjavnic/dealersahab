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
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 fancy" align="center"><h2 >How to pages</h2></div>
		</div>
	<div class="container">
	
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	<?php echo str_replace("'","",$topages[0]->page_desc);?>
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>