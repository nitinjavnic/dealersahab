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
        <div class="col-md-12 fancy" align="center"><h2 >Tips, Market & Trends</h2></div>
    </div>
</div>


<div class="container">




    <div class="row">
        <div class="clearfix"></div>

        <div class="col-md-12 ">


            <div class="row test">
               <?php foreach ($blog as $blogs) {?>
                <div class="row review-point ">
                    <div class="col-md-4 blog-img">
                        <?php
                        $servicephoto="/blogphoto/";
                        $path ='/local/images'.$servicephoto.$blogs->photo;
                        if($blogs->photo!=""){
                        ?>
                        <td><img src="<?php echo $url.$path;?>"></td>
                        <?php } else { ?>
                        <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>"></td>
                        <?php } ?>

                    </div>
                    <div class="col-md-8 blog-info ">
                        <a href="<?php echo $url;?>/readmore/{{ $blogs->id }}"><h3 class="mt-0 text-capitalize"><strong><?php echo $blogs->blog_titile ?></strong></h3></a>
                        <p><?php echo  str_limit($blogs->full_description, 500);?></p>
                        <a href="<?php echo $url;?>/readmore/{{ $blogs->id }}" class="btn btn-success float-right blog-more-btn">Read more</a>
                    </div>
                </div>
                <?php }?>

            </div>



        </div>



    </div>



</div>
<div class="container" style="text-align:right;">
    @foreach ($blog as $shop)
    @endforeach
    {{ $blog->links() }}

</div>



<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>