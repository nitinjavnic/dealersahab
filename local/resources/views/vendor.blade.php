<!DOCTYPE html>
<html lang="en">
<head>

    <?php

    $url = URL::to("/"); ?>

    @include('style')




    <script src="<?php echo $url;?>/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->

<div class="clearfix"></div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-12 bg-company-info">

        </div>
    </div>

    <div class="container ">
        <div class="row block-company">
            <div class="col-md-2 col-4">

                <?php $shopphoto="/shop/";
                $paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
                if($shop[0]->profile_photo!=""){?>
                <img src="<?php echo $url.$paths;?>" class="img-fluid company-profile"></div>

            <?php } else { ?>

            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-fluid company-profile"></div>


        <?php } ?>


        <div class="col-md-6 col-8">
            <?php if(Auth::check()) { ?>
            <h2><?php echo $shop[0]->shop_name;?><a href="#" data="<?php echo $shop[0]->shop_name;?>" class="btn btn-success pin-seller " id="pinned">Pinned </a></h2>

        <?php }?>
            <p><strong>Address-</strong> <?php echo $shop[0]->address;?> <br/><strong>Profile View</strong></p>
            <table class="text-center">
                <tr>
                    <td><strong>Nature of Business</strong></td>
                    <td><strong>Year of Establishment</strong></td>
                </tr>
                <tr>
                    <td><?php echo $sellertype; ?></td>
                    <td>2010</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Legar Status of Firm</strong></td>
                    <td><strong>GST No.</strong></td>
                </tr>
                <tr>
                    <td>Manufecturer</td>
                    <td>2010</td>
                    <td></td>
                </tr>
            </table>
            <br>
            <p><strong>Product Dealing-</strong> Compressor,ac Freez Motor</p>
            <p><strong>Brand- </strong> Alg8i, Usha</p>
                <p><strong>Description</strong></p>
            <p>Concise description which, among other items of information, includes (1) firm's history, (2) number and quality of its human, financial, and physical resources (3) organizational and management structure, (4) past, current and anticipated performance, and (5) its reputation, and the standing of its goods or services.</p>
        </div>
        <div class="col-md-4 col-12">
            <div class="well well-sm">


                <?php if($rating_count==0) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rating">
                            No Reviews
                        </div>

                    </div>
                </div>
                <?php } else { ?>

                <div class="row">
                    <div class="col-md-12">

                        <div class="rating">
                            <?php
                            if($rating[0]->rating=="")
                            {
                                $starpath = '/local/images/nostar.png';
                            }
                            else {
                                $starpath = '/local/images/'.$rating[0]->rating.'star.png';
                            }
                            ?>
                                <span><?php echo $rating[0]->rating ?></span> <img src="<?php echo $url.$starpath;?>" class="star_rates" alt="rated <?php if($rating[0]->rating==""){ echo "0"; } else { echo $rating[0]->rating; }?> stars" title="rated <?php if($rating[0]->rating==""){ echo "0"; } else { echo $rating[0]->rating; }?> stars" />  - &nbsp; <?php  echo $rating_count;?> Users
                            <?php

                            ?>

                        </div>


                    </div>
                </div>

                <?php } ?>



                <p style="float:left;">0 &nbsp;&nbsp; </p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p style="float:left;"><?php echo $rating_count; ?>  &nbsp;&nbsp; </p>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p style="float:left;">0 &nbsp;&nbsp; </p>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p style="float:left;">0 &nbsp;&nbsp; </p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p style="float:left;">0 &nbsp;&nbsp; </p>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>





            <p class="pt-10">Contact No- <?php echo $shop[0]->shop_phone_no ?></p>
                <p>Email- <?php echo $shop[0]->seller_email ?></p>
            <a href="<?php echo $url;?>/booking/<?php echo $shop[0]->id;?>/<?php echo $shop[0]->sub_category;?>/<?php echo $shop[0]->user_id;?>" class="btn btn-warning btn-lg post-btn">Contact Seller</a>
        </div>





            <div class="row">


                    <div class="clearfix"></div>
            <div class="gallery-filter">
                    <ul class="nav nav-tabs" id="myTab">
                        <?php foreach ($allsubcategory as $allsubcategory) {?>
                            <li class=""><a href="#<?php echo $allsubcategory->subname ?>" class="productCategory"  data="<?php echo $allsubcategory->subid ?>" data-toggle="tab"><?php echo $allsubcategory->subname ?></a></li>

                        <?php } ?>


                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active test">

                            <div class="row">
                                <div class="col-md-12 text-center" id="shopProfile">


                                </div>
                            </div>
                        </div>


                    </div>
            </div>





            </div>


        </div>







        <div class="row block-company1">

            <div class="col-md-8 review-info1 pb-20 pr-20">


                <?php if($rating_count==0) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rating">
                            No Reviews
                        </div>

                    </div>
                </div>
                <?php } else { ?>

                <h3 class="review-heading"><span >Customer Rating & Comments </span></h3>
                <?php foreach($rating as $newrating){?>
                <img src="../img/banner.jpg" alt="">

                <div class="rating">
                    <?php
                    if($newrating->rating=="")
                    {
                        $starpath = '/local/images/nostar.png';
                    }
                    else {
                        $starpath = '/local/images/'.$newrating->rating.'star.png';
                    }
                    ?>
                    <img src="<?php echo $url.$starpath;?>" class="star_rates" alt="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" title="rated <?php if($newrating->rating==""){ echo "0"; } else { echo $newrating->rating; }?> stars" />  - &nbsp; <?php  echo $newrating->name;?>

                </div>
                <p class="mt-20"><?php echo $newrating->comment; ?></p>
                <?php } ?>
                <?php } ?>
                <hr>
            </div>

            <div class="col-md-4 review-info1 bd-left">
                <h3 class="review-heading text-center"><b>You can also check-</b></h3>
                <div>
                <img src="../img/banner.jpg" alt="" >
                <h4><strong>Dummy India Pvt. Ltd.</strong></h4>
                <p><strong>Location-</strong> Delhi</p>
                    <p><b>250 Profile Views</b></p>
                    <p><b>Nature of Business-</b> Dealer</p>
                    <p><b>Product Dealing-</b> Compressor,Piston,Tools</p>
                    <p><b>Brand-</b> Usha,Algi,Shakti,Kirlooskar</p>
                </div>
                <hr>

                <div>
                    <img src="../img/banner.jpg" alt="" >
                    <h4><strong>Dummy India Pvt. Ltd.</strong></h4>
                    <p><strong>Location-</strong> Delhi</p>
                    <p><b>250 Profile Views</b></p>
                    <p><b>Nature of Business-</b> Dealer</p>
                    <p><b>Product Dealing-</b> Compressor,Piston,Tools</p>
                    <p><b>Brand-</b> Usha,Algi,Shakti,Kirlooskar</p>
                </div>
                <hr>

                <div>
                    <img src="../img/banner.jpg" alt="" >
                    <h4><strong>Dummy India Pvt. Ltd.</strong></h4>
                    <p><strong>Location-</strong> Delhi</p>
                    <p><b>250 Profile Views</b></p>
                    <p><b>Nature of Business-</b> Dealer</p>
                    <p><b>Product Dealing-</b> Compressor,Piston,Tools</p>
                    <p><b>Brand-</b> Usha,Algi,Shakti,Kirlooskar</p>
                </div>
                <hr>



            </div>
        </div>

    </div>
</div>







@include('footer')
<?php if(session()->has('message')){?>
<script type="text/javascript">
    alert("<?php echo session()->get('message');?>");
</script>
</div>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

    $('#pinned').on('click', function() {
        src = "{{ route('pinned') }}";

        var shopUrl = $(location).attr('href');
        var shopname = $(this).attr("data");

        $.ajax({
            type: 'POST',
            url: src,
            data: {
                "_token": "{{ csrf_token() }}",
                shopUrl : shopUrl,
                shopname : shopname
            },
            success: function(data) {
                   if(data.success==='false'){

                       swal("This Url is already Exits!");

                   }else if(data.success==='true'){
                       swal("Pinned Seller Save!");


                   }

            }
        });

    });



        $('.productCategory').on('click', function() {
            src = "{{ route('getproduct') }}";
            var userId = $(this).attr("data");
            $.ajax({
                type: 'GET',
                url: src,
                data: {
                    subid : userId,
                },
                    success: function(data) {
                        let profileUrl = 'http://localhost/dealerSahab/local/images/productimage/';
                        $.each(data, function (index,value) {
                            var id = value.value['id'];
                            var testurl = "/admin/subservices/"+ id;
                            src = "{{ route('getseller')}}";
                            var product_name = value.value['product_name'];
                                var subcategory = value.value['subcategory_id'];
                                var product_image = value.value['photo'];
                                var image = profileUrl + product_image;
                                $("#shopProfile").append('<div class="col-md-3 pt-30">\n' +
                                '                                        <img src='+ image +' class="img-responsive">\n' +
                                '                                        <a href='+src+' class="">'+ product_name +'</a>\n' +
                                '                                    </div>');


                        });

                    }
            });

        });







</script>
</body>




</html>
