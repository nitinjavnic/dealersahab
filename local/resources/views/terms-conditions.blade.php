<?php
/*if (Auth::check())
{
	
}
else
{
	//redirect()->route('login');
	
	echo Redirect::to('login');
}*/
?>   
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
			<div class="col-md-12 fancy" align="center"><h2> Terms and Conditions</h2></div>
		</div>
	<div class="container">
	 
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	
	
	
	<?php echo str_replace("'","",$term[0]->page_desc);?>
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>