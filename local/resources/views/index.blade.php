<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	?>
<!DOCTYPE html>
<html lang="en">
<head>



   @include('style')



    <script type="text/javascript">

        <?php echo $google[0]->page_desc ?>;

    </script>

</head>
<body>



    <!-- fixed navigation bar -->
    @include('homeheader')

    <!-- slider -->



    <div id="banner">
	<div id="overlays"></div>
	<?php if(!empty($setts[0]->site_banner)){?>
      <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_banner;?>" class="img-responsive bannerheight">
	<?php } else {?>
	<img src="<?php echo $url;?>/img/banner.jpg" class="img-responsive bannerheight">
	<?php } ?>


        <div class="container info-sub1">
            <div class="row ">
                <div class="col-md-3 col-3"></div>
                <div class="col-md-6 col-6  ">
                    <div class="row info-sub pt-10">
                        <div class="col-md-4 text-center ">
                            <p><strong><?php echo $total_user; ?></strong><br>Total User</p>
                        </div>

                        <div class="col-md-4 text-center">
                            <p><strong><?php echo $totalManufacturer; ?></strong><br>Total Manufacturer</p>
                        </div>


                        <div class="col-md-4 text-center">
                            <p><strong><?php echo $total_seller; ?></strong><br>Total Seller</p>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-3"></div>
            </div>
        </div>
    </div>

	<div class="bannertxt">
		<div class="col-md-12" align="center">
		<div class="row">
		<h1 class="headingcolor"> Get the Best </h1>
		</div>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<h4 class="headingcolor"> Manufacturer | Franchises | Dealer | Trader | Wholesaler | Supplier | Distributor </h4>
		</div>
		<div class="col-md-2"></div>
		</div>
		</div>





        <div class="col-md-12 form_move" align="center">
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
            <div class="col-md-2"></div>


        </div>



	</div>

	<script>
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




<div class="container sub-cat">
    <div class="col-md-12 nopadding">
	
	
    <div id="flexiselDemo34">
	<?php foreach ($services as $service) {


     $subserve=strtolower($service->name);
     $result_url = preg_replace('/[ ,]+/', '-', trim($subserve));
	?>


	<li>
	<div class="move10">
	<?php
					   $servicephoto="/servicephoto/";
						$path ='/local/images'.$servicephoto.$service->image;
						if($service->image!=""){
						?>
	<a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.$path;?>" border="0" width="50"></a>
	<?php } else { ?>
						  <a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" border="0" width="50"></a>
						 <?php } ?>

	</div>

	<div><a href="<?php echo $url; ?>/subservices/<?php echo $result_url;?>" class="serviceclr"><?php echo $service->name;?></a></div>
	</li>
	<?php } ?>

</div>
	 
</div>
</div>


	


	<div class="ashbg">



        <div class="clearfix"></div>



        <div class="container">
            <div class="col-md-12 nopadding">
                <?php if(!empty($two[0]->name)){?><h2 class="sli-head"><?php echo $two[0]->name;?></h2><?php } ?>

                <?php if(!empty($two_count)){?>
                <div id="flexiselDemo111">
                    <?php

                    foreach($second as $newservice){


                    $subview=strtolower($newservice->subname);
                    $results = preg_replace('/[ ,]+/', '-', trim($subview));
                    ?>
                    <li>
                        <div class="weightbg">
                            <div>
                                <?php
                                $subservicephoto="/subservicephoto/";
                                $path ='/local/images'.$subservicephoto.$newservice->subimage;
                                if($newservice->subimage!=""){
                                ?>
                                <a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive" /></a>
                                <?php } else {?>
                                <a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
                                <?php } ?>
                            </div>
                            <div><a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
                        </div>
                    </li>
                    <?php } ?>

                </div>
                <?php } ?>
            </div>
        </div>



	<div class="container">
    <div class="col-md-12 nopadding">
	<?php if(!empty($one[0]->name)){?> <h2 class="sli-head"><?php echo $one[0]->name;?></h2><?php } ?>
	 <?php if(!empty($one_count)){?>
    <div id="flexiselDemo3">
	<?php

		 foreach($first as $newservice){

			 $subview=strtolower($newservice->subname);


			 $results = preg_replace('/[ ,]+/', '-', trim($subview));
			 ?>
    <li>
	<div class="weightbg">
	<div>
	<?php
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$newservice->subimage;
						if($newservice->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive"/></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
						<?php } ?>
	</div>
	<div><a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
	</div>
	</li>
		 <?php } ?>

</div>
	 <?php } ?>
</div>
</div>





<div class="container">
    <div class="col-md-12 nopadding">
	 <?php if(!empty($two[0]->name)){?><h2 class="sli-head"><?php echo $two[0]->name;?></h2><?php } ?>

	 <?php if(!empty($two_count)){?>
    <div id="flexiselDemo31">
	<?php

		 foreach($second as $newservice){
			  $subview=strtolower($newservice->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
			 ?>
    <li>
	<div class="weightbg">
	<div>
	<?php
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$newservice->subimage;
						if($newservice->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive" /></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
						<?php } ?>
	</div>
	<div><a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
	</div>
	</li>
		 <?php } ?>

</div>
	 <?php } ?>
</div>
</div>



<div class="clearfix"></div>




<div class="container">
    <div class="col-md-12 nopadding">
	 <?php if(!empty($three[0]->name)){?><h2 class="sli-head"><?php echo $three[0]->name;?></h2><?php } ?>
	 <?php if(!empty($three_count)){?>
    <div id="flexiselDemo32">
	<?php

		 foreach($third as $newservice){
			 $subview=strtolower($newservice->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
			 ?>
    <li>
	<div class="weightbg">
	<div>
	<?php
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$newservice->subimage;
						if($newservice->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive"/></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
						<?php } ?>
	</div>
	<div><a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
	</div>
	</li>
		 <?php } ?>

</div>
	 <?php } ?>
</div>
<div class="col-md-1"></div>
</div>




	<div class="clearfix"></div>



	<div class="container">

    <div class="col-md-12 nopadding">
	 <?php if(!empty($four[0]->name)){?><h2 class="sli-head"><?php echo $four[0]->name;?></h2><?php } ?>
	 <?php if(!empty($four_count)){?>
    <div id="flexiselDemo33">
	<?php

		 foreach($fourth as $newservice){
			  $subview=strtolower($newservice->subname);
			$results = preg_replace('/[ ,]+/', '-', trim($subview));
			 ?>
    <li>
	<div class="weightbg">
	<div>
	<?php
					   $subservicephoto="/subservicephoto/";
						$path ='/local/images'.$subservicephoto.$newservice->subimage;
						if($newservice->subimage!=""){
						?>
	<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.$path;?>" class="img-responsive" /></a>
						<?php } else {?>
						<a href="<?php echo $url; ?>/search/<?php echo $results;?>"><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="img-responsive"></a>
						<?php } ?>
	</div>
	<div><a href="<?php echo $url; ?>/search/<?php echo $results;?>"><?php  echo $newservice->subname;?></a></div>
	</div>
	</li>
		 <?php } ?>

</div>
	 <?php } ?>
</div>

</div>




	<!-- main container -->




	<div class="clearfix"></div>

	</div>

	<div class="clearfix"></div>


    <div class="works">
        <div class="container">
            <div class="col-md-12" align="center"><h1>Tips, Market & Trends</h1></div>
            <div class="height30"></div>
            <div class="row">

           <?php foreach($blog as $blog){

                $blogphoto="/blogphoto/";
                $path ='/local/images'.$blogphoto.$blog->photo;

               ?>



                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top " src="<?php echo $url.$path;?>" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $blog->date_time; ?> <span class="f-right">By Admin</span> </h6>
                            <h4 class="card-title"><?php  echo $blog->blog_titile;?></h4>
                            <p class="card-text">
                                <?php
                                 echo  str_limit($blog->blog_text, 100);

                                ?>

                            </p>
                            <a href="<?php echo $url;?>/readmore/{{ $blog->id }}" class="card-link">MORE</a>
                        </div>
                    </div>
                </div>

               <?php } ?>

            </div>
        </div>
    </div>
    </div>




	<div class="clearfix"></div>


	<div class="blog">
	<div class="clearfix"></div>
	<div class="container">
	 <div class="col-md-12" align="center"><h1>Customers Review & Ratings</h1></div>
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>


	<div class="col-md-10 nopadding  ">


        <?php foreach ($testimonials as $testimonials){
            ?>
            <div class="col-md-4 col-12">

                <div class="testimons">
                    <h4><?php echo $testimonials->name ?></h4>


                    <?php if($testimonials->star==1){ ?>
                    <span class="fa fa-star text-warning"></span>
                    <?php } ?>

                    <?php if($testimonials->star==2){ ?>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <?php } ?>

                    <?php if($testimonials->star==3){ ?>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <?php } ?>

                    <?php if($testimonials->star==4){ ?>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <?php } ?>

                    <?php if($testimonials->star==5){ ?>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <?php } ?>
                    <p><?php echo $testimonials->description ?></p>
                </div>
            </div>

        <?php } ?>

	</div>






	<?php /* ?><div class="col-md-10">

	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget.
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>


	</div>
	</div>


	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget.
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>


	</div>
	</div>



	<div class="col-md-4">
	<div class="blog-wightbg">
	<img src="img/thumb/p5.jpg" class="img-responsive" alt="">
	<p>Gary was friendly, professional, and his work was incredible. He helped us create a design we loved within our budget.
	Whole Foods customers say how much the mural brightens our space</p>
	<div class="clear"></div>
	<div class="user">
	<img src="img/thumb/user1.jpg" class="img-responsive" alt="">
	<div class="user-txt">
	<h4>The PRO</h4>
	<h5>Mickey Peter</h5>
	</div>
	</div>

	</div>
	</div>

	</div><?php */?>















	<div class="col-md-1"></div>
	</div>

	</div>

	</div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	</div>






      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>