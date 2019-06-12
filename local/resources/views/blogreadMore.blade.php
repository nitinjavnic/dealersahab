<!DOCTYPE html>
<html lang="en">
<head>

    @include('style')

</head>
<body>

<!-- fixed navigation bar -->
@include('header')

<!-- slider -->
<?php $url = URL::to("/"); ?>

<div class="clearfix"></div>

<div class="video">
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 fancy" align="center"><h2>Tips, Market & Trends</h2></div>

        <div class="height30"></div>
    </div>
    <div class="container">



        <?php foreach ($blog as $newblog) {?>
        <div class="row test">

            <div class="row review-point m-0">
                <div class="col-md-4 blog-img">


                    <?php
                    $servicephoto="/blogphoto/";
                    $path ='/local/images'.$servicephoto.$newblog->photo;
                    if($newblog->photo!=""){
                    ?>
                    <td><img src="<?php echo $url.$path;?>"></td>
                    <?php } else { ?>
                    <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>"></td>
                    <?php } ?>


                    <div class="text-center center-block pb-10">
                        <br />
                        <a href="#"><i id="social-gp" class="fa fa-facebook-square fa-2x social"></i></a>
                        <a href="#"><i id="social-gp" class="fa fa-twitter-square fa-2x social"></i></a>
                        <a href="#"><i id="social-gp" class="fa fa-linkedin-square fa-2x social"></i></a>
                        <a href="#"><i id="social-gp" class="fa fa-quora fa-2x social"></i></a>
                    </div>


                </div>



                <div class="col-md-8 blog-info ">
                    <a href=""><h3><strong><?php echo $newblog->blog_titile; ?></strong></h3></a>
                    <p><?php echo $newblog->blog_text; ?></p>

                </div>



            </div>

        </div>
        <?php } ?>
    </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>