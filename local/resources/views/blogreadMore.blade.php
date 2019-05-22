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
        <div class="col-md-12" align="center"><h1>Blog View</h1></div>
    </div>
    <div class="container">



        <div class="height30"></div>
        <div class="row test">
            <div class="row review-point m-0">
                <div class="col-md-4 blog-img">
                    <img src="http://localhost/dealersahab/local/images/shop/1496146095.jpg" alt="">


                    <div class="text-center center-block">
                        <br />
                        <a href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                        <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                        <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                        <a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                    </div>


                </div>

                <?php foreach ($blog as $newblog) {?>

                <div class="col-md-8 blog-info ">
                    <a href=""><h3><strong><?php echo $newblog->blog_titile; ?></strong></h3></a>
                    <p><?php echo $newblog->blog_text; ?></p>

                </div>

              <?php } ?>

            </div>

        </div>

    </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>