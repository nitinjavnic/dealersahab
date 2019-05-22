 
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
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Services</h1></div>
	 </div>
	<div class="container">
	 
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
	<div class="container">
	<div class="row">
	<form class="form-horizontal" role="form" method="POST" action="{{ route('services') }}" id="formID" enctype="multipart/form-data">
   <div class="col-md-12">
   {!! csrf_field() !!}
   
   
   <input type="hidden" name="editid" value="<?php echo $editid;?>">
   
   
	<div class="form-group col-md-4 swidth" >
	<label>Category Name<span class="star">*</span></label>
		<select id="change_category" class="form-control validate[required]" id="subservice_id" name="service" required>
			<option value="">Select Services</option>
			<?php foreach($services as $disp){?>
			   <option value="<?php echo $disp->id;?>"><?php echo $disp->name;?></option>
		<?php }  ?>
		</select>
	</div>


	   <div class="form-group col-md-4 swidth" >
		   <label>Subcategory Name<span class="star">*</span></label>
		   <select  class="form-control col-md-7 col-xs-12" id="subservice" name="subservice" required="required">
			   <option value="">

			   </option>

		   </select>
	   </div>


	   <div class="form-group col-md-4 swidth" >
		   <label>SuperSub category Name<span class="star">*</span></label>
		   <select  class="form-control col-md-7 col-xs-12" id="subsuperservice" name="supersubservice" required="required">
			   <option value="">

			   </option>

		   </select>

	   </div>


	   <div class="form-group col-md-4 swidth" >
		   <label>Product Image<span class="star">*</span></label>
		   <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">

	   </div>

	   <div class="item form-group">
		   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Product Name <span class="required">*</span>
		   </label>
		   <div class="col-md-6 col-sm-6 col-xs-12">
			   <input id="name" class="form-control col-md-7 col-xs-12"  name="productname" value="{{ old('name') }}" required="required" type="text">
			   @if ($errors->has('name'))
				   <span class="help-block" style="color:red;">
                                        <strong>That product name is already exists</strong>
                                    </span>
			   @endif
		   </div>
	   </div>

	
	
	<div class="form-group col-md-2 swidth">		
		<label>Price <span class="star">*</span></label>
		<input type="text"  name="price" required id="price" class="form-control validate[required] text-input" value="<?php if(!empty($sellservices)) { echo $sellservices[0]->price; }?>">
	</div>
	

	<input type="hidden" name="user_id" value="<?php echo $uuid;?>">
	
	<input type="hidden" name="shop_id" value="<?php echo $shopview[0]->id;?>">
	
	
	</div>
	
	<div class="clearboth"></div>
	<div class="col-md-12">
		                       
							   <a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff">Reset</a>
							   
							   
							   <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btn-md radiusoff btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                                <button type="submit" class="btn btn-success btn-md radiusoff">
                                    Submit
                                </button>
                           <?php } ?>
		</div>
	
	
	</form>
	
	</div>
	
	
	
	<div class="clearfix"></div>
	<div class="row" align="right" style="margin-bottom:2px;">
	 <?php if(config('global.demosite')=="yes"){?><span class="disabletxt">( <?php echo config('global.demotxt');?> ) </span><button type="button" class="btn btn-primary radiusoff btndisable">Add Services</button> 
								<?php } else { ?>
	
	 <a href="<?php echo $url;?>/services" class="btn btn-primary radiusoff">Add Services</a>
								<?php } ?>
	 
	 </div>
	 
	<div class="row">
	<div class="table-responsive">
	<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sno</th>
      <th>Category</th>
      <th>Price</th>

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


</html>