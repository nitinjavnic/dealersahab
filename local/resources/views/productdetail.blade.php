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
    echo $FileName; ?>;



</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->



<?php $url = URL::to("/"); ?>








<div class="clearfix"></div>




    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-company-info-3 ">

                <?php $shopphoto="/shop/";
                $paths ='/local/images'.$shopphoto.$shop[0]->cover_photo;
                if($shop[0]->cover_photo!=""){?>

                <style type="text/css"> .bg-company-info-3 { background: url(<?php echo $url.$paths; ?>); } </style>

                <?php } else { ?>
                <style type="text/css"> .bg-company-info-3 { background: url(<?php echo $url.'/local/images/nophoto.jpg' ?>); } </style>


                <?php }?>



            </div>
        </div>


    <div class="container ">

        <div class="height30"></div>

            <div class="row border-shadow product-info-details">
                <div class="clearfix-3"></div>
                <div class="col-md-3 product-img">
                    <?php $shopphoto="/productimage/";
                    $paths ='/local/images'.$shopphoto.$products[0]->photo;
                    if($products[0]->photo!=""){?>
                    <img src="<?php echo $url.$paths;?>" class="img-fluid">

                <?php } else { ?>

            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="" class="img-fluid">

    <?php } ?>
                </div>

                <div class="col-md-9 ">
                    <h3><?php echo $products[0]->product_name ?></h3>
                    <h5 class="text-dark">Rs <?php echo $products[0]->price ?>/Unit <a class="text-info" href="<?php echo $url;?>/contactseller/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->user_id;?>"> Get Latest Price</a>
                    </h5>Product Brochure

                    <?php $shopphoto="/Brochure/";
                    $paths ='/local/images'.$shopphoto.$products[0]->brochure;
                    if($products[0]->brochure!=""){?>
                    <a href="<?php echo $url.$paths;?>">Download Brochure</a>

                <?php } else { ?>



                <?php } ?>

                    <h4>Product Features</h4>
                   <p><?php echo $products[0]->productfeature ?></p>
                    <h4>Product Description</h4>
                    <p><?php echo $products[0]->productdesc ?></p>
                    <div class="text-center row product-info-btn">
                        <a href="<?php echo $url;?>/contactseller/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->user_id;?>" class="btn btn-info mt-20">Contact seller<p>Ask for best deal</p></a>
                        <a href="<?php echo $url;?>/booking/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->id;?>/<?php echo $products[0]->user_id;?>
                                "class="btn btn-info mt-20">Order Now<p>Ask for best deal</p></a>
                    </div>

                </div>


        <div class="clearfix"></div>

            <div class="col-md-12">
                <h3 class="pl-10">You may also like</h3>
            </div>

            <?php foreach ($randomProduct as $random) {?>

            <div class="col-md-3 col-12 text-center product-box">
                <div class="product-border">

                    <?php $shopphoto="/productimage/";
                    $paths ='/local/images'.$shopphoto.$random->photo;
                    if($random->photo!=""){?>
                    <img src="<?php echo $url.$paths;?>" class="img-fluid">

                <?php } else { ?>


                <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="" class="img-fluid"></div>


            <?php } ?>
                    <p class="pt-10"><a href="#"><?php echo $random->product_name ?></a></p>
                    <p>Rs <?php echo $random->price ?>Lakh/Unit</p>
                    <p class="text-gray">Aman Impex</p>
                    <h4>Delhi</h4>
                    <a href="<?php echo $url;?>/productDetail/{{ $random->id }}"  value="Get latest Price" class="btn btn-info" >Get latest Price</a>
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