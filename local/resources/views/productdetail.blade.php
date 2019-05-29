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
                    <h5 class="text-dark">Rs <?php echo $products[0]->price ?>/Unit <span class="text-info"> Get Latest Price</span></h5>
                    <p>Product Brochure</p>
                    <h4>Product Features</h4>
                   <p><?php echo $products[0]->productfeature ?></p>
                    <h4>Product Description</h4>
                    <p><?php echo $products[0]->productdesc ?></p>
                    <div class="text-center row product-info-btn">
                        <a href="<?php echo $url;?>/booking/<?php echo $products[0]->shop_id;?>/<?php echo $products[0]->subcategory_id;?>/<?php echo $products[0]->user_id;?>" class="btn btn-info ">Contact seller<p>Ask for best deal</p></a>
                    </div>

                </div>

            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="">You may also like</h3>
            </div>
            <div class="col-md-3 col-12 text-center product-box">
                <div class="product-border">
                    <img src="http://localhost/dealersahab/local/images/shop/1496146095.jpg"  alt="Mobile and Desktop">
                    <p class="pt-10"><a href="#">Paper Coffee cup making Machin</a></p>
                    <p>Rs 5.6Lakh/Unit</p>
                    <p class="text-gray">Aman Impex</p>
                    <h4>Delhi</h4>
                    <input type="button" value="Get latest Price" class="btn btn-info">
                </div>
            </div>
            <div class="col-md-3 col-12 text-center product-box">
                <div class="product-border">
                    <img src="http://localhost/dealersahab/local/images/shop/1496146095.jpg"  alt="Mobile and Desktop">
                    <p class="pt-10"><a href="#">Paper Coffee cup making Machin</a></p>
                    <p>Rs 5.6Lakh/Unit</p>
                    <p class="text-gray">Aman Impex</p>
                    <h4>Delhi</h4>
                    <input type="button" value="Get latest Price" class="btn btn-info">
                </div>
            </div>
            <div class="col-md-3 col-12 text-center product-box">
                <div class="product-border">
                    <img src="http://localhost/dealersahab/local/images/shop/1496146095.jpg"  alt="Mobile and Desktop">
                    <p class="pt-10"><a href="#">Paper Coffee cup making Machin</a></p>
                    <p>Rs 5.6Lakh/Unit</p>
                    <p class="text-gray">Aman Impex</p>
                    <h4>Delhi</h4>
                    <input type="button" value="Get latest Price" class="btn btn-info">
                </div>
            </div>
            <div class="col-md-3 col-12 text-center product-box">
                <div class="product-border">
                    <img src="http://localhost/dealersahab/local/images/shop/1496146095.jpg"  alt="Mobile and Desktop">
                    <p class="pt-10"><a href="#">Paper Coffee cup making Machin</a></p>
                    <p>Rs 5.6Lakh/Unit</p>
                    <p class="text-gray">Aman Impex</p>
                    <h4>Delhi</h4>
                    <input type="button" value="Get latest Price" class="btn btn-info">
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