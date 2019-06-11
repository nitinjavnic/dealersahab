 
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->

	
	<div class="clearfix"></div>
	
	<div class="video ">
	<div class="clearfix"></div>
	<div class="clearfix"></div>
		<div class="container">
	<div class="row border-shadow p-25">

	 <div class="col-md-12 fancy" align="center"><h3 class=" heading-0">Add Product</h3></div>


	 
	 <div class="height30"></div>
	 
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
	<div class="container ">
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('services') }}" id="formID" enctype="multipart/form-data">
   <div class="col-md-12">
   {!! csrf_field() !!}
   
   
   <input type="hidden" name="editid" value="<?php echo $editid;?>">
   
   
	<div class="form-group col-md-4 swidth " >
	<label>Select Industry<span class="star">*</span></label>
		<select id="change_category" class="form-control validate[required]" id="subservice_id" name="service" required>
			<option value="">Select Industry</option>
			<?php foreach($services as $disp){?>
			   <option value="<?php echo $disp->id;?>"><?php echo $disp->name;?></option>
		<?php }  ?>
		</select>




	</div>


	   <div class="form-group col-md-4 swidth" >
		   <label>Select Sector<span class="star">*</span></label>
		   <select  class="form-control col-md-7 col-xs-12" id="subservice" name="subservice" required="required">
			   <option value="">

			   </option>

		   </select>
	   </div>


	   <div class="form-group col-md-4 swidth" >
		   <label>Select Product Type<span class="star">*</span></label>
		   <select  class="form-control col-md-7 col-xs-12" id="subsuperservice" name="supersubservice" required="required">
			   <option value="">

			   </option>

		   </select>

	   </div>


	   <div class="form-group col-md-6 swidth" >
		   <label>Product Image<span class="star">*</span></label>
		   <input type="file" id="photo" name="photo" class="form-control col-md-8 col-xs-12">
		   <?php if(!empty($sellservices)) {

		   $servicephoto="/productimage/";
		   $path ='/local/images'.$servicephoto.$sellservices[0]->photo;
		   if($sellservices[0]->photo!=""){
		   ?>
		   <div class="item form-group" align="center">
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <img src="<?php echo $url.$path;?>" class="thumb " width="100" style="float:left" height="100">
			   </div>
		   </div>
		   <?php } else {?>
		   <div class="item form-group" align="center">
			   <div class="col-md-6 col-sm-6 col-xs-12">
				   <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb " width="100" height="100" style="float:left">
			   </div>
		   </div>
		   <?php ?>



		   <input type="hidden" name="photo" value="<?php echo $sellservices[0]->photo;?>">

		   <?php }}?>
	   </div>

	   <div class="item form-group">
		   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"  > Product Name <span class="required">*</span>
		   </label>
		   <div class="col-md-6 col-sm-6 col-xs-12">
			   <input id="name" class="form-control col-md-12 col-xs-12"  name="productname" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->price; }?>" required="required" type="text">
			   @if ($errors->has('name'))
				   <span class="help-block" style="color:red;">
                                        <strong>That product name is already exists</strong>
                                    </span>
			   @endif
		   </div>
	   </div>

	
	
	<div class="form-group col-md-4 swidth">
		<label>Price <span class="star">*</span></label>
		<input type="text"  name="price" required id="price" class="form-control validate[required] text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->price; }?>">
	</div>

	   <div class="form-group col-md-4 swidth">
		   <label>Company Name <span class="star">*</span></label>
		   <input type="text"  name="comapanyname"  id="comapanyname" class="form-control validate[required] text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->comapanyname; }?>">
	   </div>

	   <div class="form-group col-md-4 swidth">
		   <label>Brochure Upload <span class="star">*</span></label>
		   <input type="file"  name="Brochure"  id="Brochure" class="form-control  text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->price; }?>">


      <?php if(!empty($sellservices)) {

      $servicephoto="/Brochure/";
	   $path ='/local/images'.$servicephoto.$sellservices[0]->brochure;
	   if($sellservices[0]->brochure!=""){
	   ?>
	   <div class="item form-group" align="center">
		   <div class="col-md-6 col-sm-6 col-xs-12">
			   <img src="<?php echo $url.$path;?>" class="thumb " width="100" style="float:left" height="100">
		   </div>
	   </div>
	   <?php } else {?>
		   <div class="item form-group" align="center">
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb " width="100" height="100" style="float:left">
		   </div>
	   </div>
	   <?php ?>



		   <input type="hidden" name="Brochure" value="<?php echo $sellservices[0]->brochure;?>">

     <?php }}?>
	   </div>






	   <div class="container-fluid">
		   <div class="row">
			   <h2 class="demo-text"></h2>
			   <div class="container ">
				   <div class="row">
					   <div class="col-md-6 ">
						   <label class="text-center">Product Description</label><br/>
						   <textarea id="editor" name="productdesc" style="border-left:.5px solid gray;" ><?php if(!empty($sellservices)) { echo $sellservices[0]->productdesc; }?></textarea>
					   </div>
					   <div class="col-md-6  ">
						   <label class="text-center">Product Feature</label><br/>
						   <textarea id="editor1" name="productfeature" style="border-left:.5px solid gray;" ><?php if(!empty($sellservices)) { echo $sellservices[0]->productfeature	; }?></textarea>
					   </div>

				   </div>
			   </div>
		   </div>
	   </div>


	   <input type="hidden" name="user_id" value="<?php echo $uuid;?>">
	
	<input type="hidden" name="shop_id" value="<?php echo $shopview[0]->id;?>">
	
	
	</div>
	
	<div class="clearboth"></div>
		<div class="clearfix"></div>

		<div class="col-md-12">
		                       
							   <a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff">Reset</a>
							   
							   
							   <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btn-md radiusoff btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                                <button id="" type="submit" class="btn btn-success btn-md radiusoff">
                                    Submit
                                </button>
                           <?php } ?>
		</div>
	
	
	</form>
	
	</div>
	
	
	
	<div class="clearfix"></div>
	<div class="col-md-12" align="right" style="margin-bottom:2px;">
	 <?php if(config('global.demosite')=="yes"){?><span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span><button type="button" class="btn btn-primary radiusoff btndisable">Add Services</button> 
								<?php } else { ?>
	
	 <a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff">Add Services</a>
								<?php } ?>
	 
	 </div>
	 
	<div class="row">
		<div class="col-md-12 tbl-right-pd">
	<div class="table-responsive">
	<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sno</th>
      <th>Category</th>
      <th>Price</th>
      <th>Product Name</th>
      <th>Company Name</th>

	  <th>Update</th>
	  <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $ii=1;
  foreach($viewservice as $newserve){

  	?>
    <tr>
      <th><?php echo $ii;?></th>
      <td><?php echo $newserve->subname;?></td>
      <td><?php echo $newserve->price.' '.$setting[0]->site_currency;?></td>
		<td><?php echo $newserve->product_name;?></td>
		<td><?php echo $newserve->comapanyname;?></td>

	  <td>
	  <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="Edit" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>"><img src="<?php echo $url.'/local/images/edit.png';?>" alt="Edit" border="0"></a>
	  <?php } ?>
	  
	  
	  </td>
	  <td>
	   <?php if(config('global.demosite')=="yes"){?>
	  <a href="#" class="btndisable"><img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
	  <?php } else { ?>
	  <a href="<?php echo $url;?>/services/<?php echo $newserve->id;?>/delete" onclick="return confirm('Are you sure you want to delete this?')">
	  <img src="<?php echo $url.'/local/images/delete.png';?>" alt="Delete" border="0"></a></td>




	  <?php } ?>
    </tr>
  <?php $ii++; } ?>
    
	
	
	
  </tbody>
</table>
	</div>
	
	</div>
	</div>
		{{--<div class="container" style="text-align:right;">


			{{ $viewservice->links() }}

		</div>--}}

	
	</div>
	
	
	
	
	</div>
	
	</div>
	</div>
	</div>

	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>

<script>
	jQuery(document).ready(function(){
		srcurl = "{{ route('getallCategory') }}";
		$("#change_category").change(function() {

			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: srcurl,
				data: {
					id : id
				},
				success: function(data) {
					if(data.error=='No Result Found'){
						$("#subservice").append("<option>" + 'No Result Found' + "</option>");
					}else {
						$.each(data, function (index,value) {

							$("#subservice").append("<option value="+ value.subid +">" + value.value + "</option>");

						});
					}
				}


			});
		});
	});

	jQuery(document).ready(function(){
		src = "{{ route('getsuballCategory') }}";
		$("#subservice").change(function() {
			var id = $(this).val();
			$.ajax({
				type: 'GET',
				url: src,
				data: {
					id : id
				},
				success: function(data) {
					if(data.error=='No Result Found'){
						$("#subsuperservice").append("<option>" + 'No Result Found' + "</option>");
					}else {
						$.each(data, function (index,value) {

							$("#subsuperservice").append("<option value="+ value.subid +">" + value.value + "</option>");

						});
					}
				}


			});
		});
	});

</script>

<script type="text/javascript">
	ClassicEditor
			.create( document.querySelector( '#editor' ) )
			.catch( error => {
				console.error( error );
			} );
	ClassicEditor
			.create( document.querySelector( '#editor1' ) )
			.catch( error => {
				console.error( error );
			} );
</script>


</html>