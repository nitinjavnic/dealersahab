<!DOCTYPE html>
<html lang="en">
<head>

    @include('style')
    <?php $google_id = 10;
    $google = DB::table('pages')
        ->where('page_id', '=', $google_id)
        ->get(); ?>



    <script type="text/javascript">

        <?php echo $google[0]->page_desc ?>;

    </script>
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
                <div class="col-md-4 blog-img ">


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
                        <hr/>
                        <div class="fancy blog-description">
                            <h2 class=" text-center">Business Rating</h2>
                            <div class="p-25">


                                <?php foreach ($randomblog as $myblog) {?>


                                <p><a href="<?php echo $url;?>/readmore/{{ $myblog->id }}"><?php echo $myblog->blog_titile ?></a></p>

                                 <?php } ?>
                            </div>
                        </div>

                </div>



                <div class="col-md-8 blog-info ">
                  <h3 class="mt-0 text-capitalize text-info"><strong><?php echo $newblog->blog_titile; ?></strong></h3>
                    <p><?php echo $newblog->full_description; ?></p>

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