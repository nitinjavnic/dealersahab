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
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>Blog</h1></div>
    </div>
</div>


<div class="container">




    <div class="row">
        <div class="clearfix"></div>

        <div class="col-md-12 ">


            <div class="row test">
               <?php foreach ($blog as $blog) {?>
                <div class="row review-point m-0">
                    <div class="col-md-2 blog-img">
                        <?php
                        $servicephoto="/blogphoto/";
                        $path ='/local/images'.$servicephoto.$blog->photo;
                        if($blog->photo!=""){
                        ?>
                        <td><img src="<?php echo $url.$path;?>"></td>
                        <?php } else { ?>
                        <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>"></td>
                        <?php } ?>

                    </div>
                    <div class="col-md-10 blog-info ">
                        <a href="http://localhost/dealersahab/vendor/wpchecking"><h3><strong><?php echo $blog->blog_titile ?></strong></h3></a>
                        <p><?php echo $blog->blog_text; ?></p>

                        <a href="<?php echo $url;?>/readmore/{{ $blog->id }}" class="btn btn-success float-right blog-more-btn">Read more</a>
                    </div>
                </div><hr>
                <?php }?>

            </div>



        </div>



    </div>



</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>