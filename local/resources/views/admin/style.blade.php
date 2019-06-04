 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::script('local/resources/assets/admin/vendors/jquery/dist/jquery.min.js')!!}
	{!!Html::script('local/resources/assets/admin/ckeditor/ckeditor.js')!!}


	<!-- Bootstrap -->
	{!!Html::style('local/resources/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/font-awesome/css/font-awesome.min.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/iCheck/skins/flat/green.css')!!}
	{!!Html::style('local/resources/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')!!}
	{!!Html::style('local/resources/assets/admin/build/css/custom.min.css')!!}
	
	{!!Html::style('local/resources/assets/admin/js/dataTables.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/buttons.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/fixedHeader.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/responsive.bootstrap.min.css')!!}
	{!!Html::style('local/resources/assets/admin/js/scroller.bootstrap.min.css')!!}
	
	<script type="text/javascript">
	$(document).ready(function(){
    $('#commission_from').on('change', function() {
		
      if ( this.value == 'vendor')
      {
        $("#vendoronly").show();
		$("#buyeronly").hide();
      }
      else if(this.value == 'buyer')
      {
        $("#vendoronly").hide();
		$("#buyeronly").show();
      }
	  else
	  {
		  $("#vendoronly").hide();
		  $("#buyeronly").hide();
	  }
    });
	
	
	
	$('#stripe_mode').on('change', function() {
		
		if ( this.value == 'test')
      {
		  $("#stripe_test_publish").show();
		  $("#stripe_test_secret").show();
		  $("#stripe_live_publish").hide();
		  $("#stripe_live_secret").hide();
	  }
	  else if(this.value == 'live')
      {
		  $("#stripe_test_publish").hide();
		  $("#stripe_test_secret").hide();
		  $("#stripe_live_publish").show();
		  $("#stripe_live_secret").show();
	  }
	  else
	  {
		  $("#stripe_test_publish").hide();
		  $("#stripe_test_secret").hide();
		  $("#stripe_live_publish").hide();
		  $("#stripe_live_secret").hide();
	  }
		
	
	});
});
</script>
   