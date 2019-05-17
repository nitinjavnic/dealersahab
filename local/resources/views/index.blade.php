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
                            <p><strong>30+M</strong><br>Users Served</p>
                        </div>

                        <div class="col-md-4 text-center">
                            <p><strong>550+K</strong><br>Service Providers</p>
                        </div>


                        <div class="col-md-4 text-center">
                            <p><strong>1200+</strong><br>Services</p>
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
		<h1 class="headingcolor"> Consider it done. </h1>
		</div>
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<h4 class="headingcolor"> From house painting to personal training, we bring you the right pros for every project on your list. </h4>
		</div>
		<div class="col-md-3"></div>
		</div>
		</div>





        <div class="col-md-12 form_move" align="center">
            <div class="col-md-2"></div>
            <form action="{{ route('search') }}" method="post" enctype="multipart/form-data" id="formID">
                <div class="col-md-8">
                    {!! csrf_field() !!}
                    <div class="col-md-3 paddingoff">
                        <input type="text" name="search_location" class="searchtext validate[required]" id="search_text" placeholder="Location">
                    </div>
                    <div class="col-md-6 paddingoff">
                        <input type="text" name="search_text" class="searchtext validate[required]" id="search_text" placeholder="What service do you need?">
                    </div>
                    <div class="col-md-3 paddingoff">
                        <input type="submit" name="search" class="searchbtn" value="Get Started">
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


<div class="clearfix"></div>



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
            <div class="col-md-12" align="center"><h1>Blog</h1></div>
            <div class="height30"></div>
            <div class="row">



                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top " src="img/v1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Mar 09,2019 <span class="f-right">By Admin</span> </h6>
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#!" class="card-link">MORE</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top " src="img/v1.jpg" alt="Card image cap" width="100%">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Mar 09,2019 <span class="f-right">By Admin</span> </h6>
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#!" class="card-link">MORE</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top " src="img/v1.jpg" alt="Card image cap" width="100%">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Mar 09,2019 <span class="f-right">By Admin</span> </h6>
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#!" class="card-link">MORE</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>




	<div class="clearfix"></div>


	<div class="blog">
	<div class="clearfix"></div>
	<div class="container">
	 <div class="col-md-12" align="center"><h1>Customers use to get millions of projects done<br/> quickly and easily</h1></div>
	 <div class="height30"></div>
	 <div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>


	<div class="col-md-10 nopadding  ">



        <div class="col-md-3 col-6">
            <div class="testimons">
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <h4>Hello</h4>
                <p>hello</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="testimons">
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <h4>Hello</h4>
                <p>hello</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="testimons">
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <h4>Hello</h4>
                <p>hello</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="testimons">
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <span class="fa fa-star text-warning"></span>
                <h4>Hello</h4>
                <p>hello</p>
            </div>
        </div>


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


    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                <h1>About us</h1>
            </div>
            <div class="col-md-6" align="justify">
                <p>
                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    We specializes in identifying, evaluating and placing the right people to meet our client's specific requirements. Our workforce spread over India has one mission to fulfill -- to find the right people to meet our client's specific requirements - in the particular rung that you have a need and at the specific locations where you need people. From our experience we have leared that every company has its own culture, values and expectations of its employees.<br>We specializes in identifying, evaluating and placing the right people to meet our client's specific requirements. Our workforce spread over India has one mission to fulfill -- to find the right people to meet our client's specific requirements - in the particular rung that you have a need and at the specific locations where you need people. From our experience we have leared that every company has its own culture, values and expectations of its employees.


                </p>
            </div>
            <div class="col-md-6 img-fluid">
                <img src="{{asset('/local/images/New-idea.jpg')}}" alt="">
            </div>

        </div>
    </div>














      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>