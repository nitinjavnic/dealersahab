 
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	
<style type="text/css">
.noborder ul,li { margin:0; padding:0; list-style:none;}
.noborder .label { color:#000; font-size:16px;}
</style>

	<?php $google_id = 10;
	$google = DB::table('pages')
			->where('page_id', '=', $google_id)
			->get(); ?>




	<?php
	$FileName = str_replace("'", "", $google[0]->page_desc);
	echo $FileName; ?>

</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

	
    
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="">
	 <div class="col-md-12 fancy" align="center"><h2>Search</h2></div>
	 </div>
	<div class="container">
	 
	 <div class="height30"></div>
	 
	 
	<div class="container">
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('shopsearch') }}" id="formID" enctype="multipart/form-data">
   <div class="col-md-12">
   {!! csrf_field() !!}
   
   
   
  
   
	<div class="col-md-4 swidth noborder" >
	
		<?php //if(!empty($serid[0]->subid)){ echo $serid[0]->subid; }
		
		?>
			
				<select name="langOpt[]" multiple id="langOpt" class="validate[required]">
				<?php 
				
				foreach($viewservices as $service){
					$sel=explode(",",$viewnames);
						
						
						
						
					?>
					
                <option value="<?php echo $service->subid;?>"  <?php  if(in_array($service->subname,$sel)){?> checked <?php } ?>   ><?php echo $service->subname;?></option>
                <?php } ?>
                </select>
	
	</div>
	
	
	
	<div class="col-md-3 swidth nocity">	
		
		<input type="text"  name="city" id="" class="form-control" placeholder="Enter City" value="<?php //echo $setting[0]->site_currency;?>">
	</div>	
	
	
	<div class="col-md-3 swidth nocity">
	<select name="star_rate" class="form-control">
	<option value="">Star Rating</option>
	<option value="1">1 Star</option>
	<option value="2">2 Stars</option>
	<option value="3">3 Stars</option>
	<option value="4">4 Stars</option>
	<option value="5">5 Stars</option>
	</select>
	</div>
	
	
	<div class="col-md-2 custobtn">
		                       
							   
                                <button type="submit" class="btn btn-success btn-md">
                                    Filter
                                </button>
                           
		</div>
	
	
	
	</div>
	
	
	
	
	
	</form>
	
	</div>
	
	
	
	</div>
	
	</div>
	<div class="notopborder"></div>
	<div class="container">
	
	<div class="container">
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	<?php if(!empty($viewnames)){?><div><h4 style="line-height:25px;">Search Result : <?php echo $viewnames;?></h4></div><?php } ?>
	
	
	
	
	
	
	 
	
	<?php if(!empty($newsearches)) { 
	
	?>
	<div class="row">
	<div class="clearfix"></div>
	<?php foreach($newsearches as $shop){ 
	
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
				<img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars"  class="star_rates" />
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
	
	<?php if($count==0){ echo $count;?>
	<div class="row"> <div class="col-md-12">No data found!</div></div>
	
	<?php } ?>
	
	
	
	<?php } ?>
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php } else {?>
	
	
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
							
				<div align="center"><a href="vendor/<?php echo $shop->name;?>" class="btn btn-success radiusoff">View Profile & Book</a></div>
			</div> 
			
			
	    </div>
	</div>	
	
	
	
	
	
	<?php } ?>
	</div>
	
	<?php } ?>
	
	
	
	
	
	
	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>