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

        <div class="height30"></div>



    <div class="container">



        <?php foreach ($blog as $newblog) {?>
        <div class="row test">



            <div class="row review-point m-0">
                <div class="col-md-4 blog-img">
                    <div class="view-blog">

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
                </div>



                <div class="col-md-6 blog-info ">
                  <h3 class="mt-0 text-capitalize text-info"><strong><?php echo $newblog->blog_titile; ?></strong></h3>
                    <p><?php echo $newblog->full_description; ?></p>

                </div>

                <div class="col-md-2 padd-0  blog-read-heading ">
                  <div class="view-blog border-shadow">
                    <h3 class="filter-heading text-center">Business Rating</h3>
                <div class="pl-10 ">
                    <p><a href="#">Online Factor</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>
                    <p><a href="#">Hello</a></p>

                </div>
                </div>
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