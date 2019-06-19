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
        <div class="col-md-12 fancy" align="center"><h2 >Pinned Details</h2></div>
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
                            <th>Action</th>


                        </tr>

                        </thead>
                        <tbody>




                        <?php

                        $i=1;
                        foreach ($services as $service) {?>

                        <?php
                        if(Auth::user()->id==$service->user_id){
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $service->shop_name;?></td>
                            <td><?php echo $service->url;?></td>
                            <td>
                                <?php if(config('global.demosite')=="yes"){?>
                                <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                <?php } else { ?>
                                <a href="<?php echo $url;?>/deletepinned/{{ $service->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>

                                <?php }} ?>
                            </td>


                        </tr>
                        <?php $i++;} ?>

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