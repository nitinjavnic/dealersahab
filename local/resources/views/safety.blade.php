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
	<div class="headerbg">
	 <div class="col-md-12" align="center"><h1>Manage Email</h1></div>
	 </div>
	<div class="container">
	<div class="col-md-12 emailer">
		<div class="clearfix"></div>
		<div class="clearfix"></div>

		<form action="#" name="add" id="add" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

			<div class="item form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">User <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select class="form-control col-md-7 col-xs-12 fn_school_id" name="#" id="#" required="required">
						<option value="">--Select--</option>
						<option value="1">Seller</option>
						<option value="2">User</option>
					</select>
					<div class="help-block"></div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Subject <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input class="form-control col-md-7 col-xs-12" name="subject" id="subject" value="" placeholder="Subject" required="required" type="text" autocomplete="off">
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Email Body <span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea class="form-control" name="body" id="body" required="required" placeholder="Email Body"> </textarea>
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Attachment</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="btn btn-default btn-file">
						<input type="file" name="attachment">
					</div>
					<div class="help-block"></div>
				</div>
			</div>
			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
					<a href="#" class="btn btn-primary">Cancel</a>
					<button id="#" type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>
				</div>


</div>
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>