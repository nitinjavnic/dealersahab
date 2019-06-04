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
					$about = DB::table('pages')
							->where('page_title', '=', 'About')
							->get();

					echo $about[0]->page_desc;
					?>

				</p>
			</div>
			<div class="col-md-6 img-fluid">
				<img src="{{asset('/local/images/New-idea.jpg')}}" alt="" width="100%">
			</div>

		</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>