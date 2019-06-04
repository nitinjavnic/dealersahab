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
    <div class="container">

        <div class="height30"></div>
        <div class="row test">


            <div class="row margin-0">
                <div class="col-md-4 product-img">


                    <?php $shopphoto="/productimage/";
                    $paths ='/local/images'.$shopphoto.$products[0]->photo;
                    if($products[0]->photo!=""){?>
                    <img src="<?php echo $url.$paths;?>" class="img-fluid"></div>

                <?php } else { ?>


            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="" class="img-fluid"></div>


    <?php } ?>

                <div class="col-md-8 product-details">
                    <h3><?php echo $products[0]->product_name ?></h3>
                    <h5 class="text-dark">Rs <?php echo $products[0]->price ?>/Unit <a class="text-info" href="<?php echo $url;?>/contactseller/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->user_id;?>"> Get Latest Price</a></h5>
 spaaduct Brochure</p>
                    <h4>Product Features</h4>
                   <p><?php echo $products[0]->productfeature ?></p>
                    <h4>Product Description</h4>
                    <p><?php echo $products[0]->productdesc ?></p>
                    <div class="text-center row product-info-btn">
                        <a href="<?php echo $url;?>/contactseller/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->user_id;?>" class="btn btn-info ">Contact seller<p>Ask for best deal</p></a>
                        <a href="<?php echo $url;?>/booking/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->subcategory_id;?>/<?php echo $products[0]->user_id;?>
                                "class="btn btn-info ">Checkout<p>Ask for best deal</p></a>
                    </div>

                </div>

            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="">You may also like</h3>
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
    </div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>