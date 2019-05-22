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
<?php $url = URL::to("/"); ?>


<!-- fixed navigation bar -->
@include('header')

<!-- slider -->











<div class="clearfix"></div>





<div class="video">
    <div class="clearfix"></div>
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>Pinned Details</h1></div>
    </div>
    <div class="container">

        <div class="height30"></div>
        <div class="row">






            <div class="col-md-12 service_style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Shop Name</th>
                            <th>Url</th>
                            <th>Status</th>
                            <?php /* ?><th>Action</th><?php */?>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>







        </div>

    </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>