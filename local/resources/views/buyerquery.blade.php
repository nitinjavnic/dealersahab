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
        <div class="col-md-12 fancy" align="center"><h2 >Buyer Query</h2></div>
    </div>
    <div class="container">

        <div class="height30"></div>
        <div class="row">


            <?php

            if($count==0){?>
            <div class="err-msg" align="center">No order found!</div>
            <?php }  else { ?>
            <div class="col-md-12 service_style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>Query Note</th>
                            <th>Action</th>
                            <?php /* ?><th>Action</th><?php */?>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sno=0;
                        foreach ($seller_query as $query) {
                        $sno++;
                        ?>
                        <?php
                        if(Auth::user()->id==$query->user_id){
                        ?>

                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $query->name;?></td>
                            <td><?php echo $query->phone;?></td>
                            <td><?php echo $query->query;?></td>
                            <td>
                                <a href="<?php echo $url;?>/delete_query/{{ $query->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>

                            </td>
                        </tr>
                        <?php }} ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <?php } ?>





        </div>

    </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>