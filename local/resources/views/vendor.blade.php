<!DOCTYPE html>
<html lang="en">
<head>

    <?php

    $url = URL::to("/"); ?>

    @include('style')




        <?php $google_id = 10;
        $google = DB::table('pages')
            ->where('page_id', '=', $google_id)
            ->get(); ?>




        <?php
        $FileName = str_replace("'", "", $google[0]->page_desc);
        echo $FileName; ?>
</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->

<div class="clearfix"></div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-12 bg-company-info">
            <?php $shopphoto="/shop/";
            $paths ='/local/images'.$shopphoto.$shop[0]->cover_photo;
            if($shop[0]->cover_photo!=""){?>

           <style type="text/css"> .bg-company-info { background: url(<?php echo $url.$paths; ?>); } </style>

        <?php } else { ?>
        <style type="text/css"> .bg-company-info { background: url(<?php echo $url.'/local/images/nophoto.jpg' ?>); } </style>


    <?php }?>
        </div>
    </div>

    <div class="container ">
        <div class="row block-company ">
            <div class="col-md-2 col-4">

                <?php $shopphoto="/shop/";
                $paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
                if($shop[0]->profile_photo!=""){?>
                <img src="<?php echo $url.$paths;?>" class="img-fluid company-profile"></div>

            <?php } else { ?>

            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-fluid company-profile"></div>

        <?php }?>



        <div class="col-md-6 col-8">
            <h2 class="text-info"><?php echo $shop[0]->shop_name;?></h2>

                <?php if(Auth::check()) { ?>
                <?php if($pinned==0) { ?>
                <a href="#" data="<?php echo $shop[0]->shop_name;?>" class="btn btn-success pin-seller " id="pinned">Pinned </a>
        <?php }else if($pinned!=0){ ?>
            <a href="#" data="<?php echo $shop[0]->shop_name;?>" class="btn btn-success pin-seller " id="pinned">Unpinned </a>

        <?php } ?>

        <?php }?>
            <p><b>Address-</b> <?php echo $shop[0]->address;?>  <?php echo $shop[0]->city; ?> <?php echo $shop[0]->state; ?> <?php  echo $shop[0]->pin_code;?><br><span><b><?php echo $shop[0]->view_counter ?> Profile Views</b></span></p>


            <table class="text-center">
                <tr>
                    <td><strong>Nature of Business</strong></td>
                    <td><strong>Year of Establishment</strong></td>
                </tr>
                <tr>
                    <td><?php echo $shop[0]->nature_of_business ?></td>
                    <td><?php echo $shop[0]->establishment ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Legar Status of Firm</strong></td>
                    <td><strong>GST No.</strong></td>
                </tr>
                <tr>
                    <td><?php echo $shop[0]->sellertype; ?></td>
                    <td><?php echo $shop[0]->gst_number ?></td>
                    <td></td>
                </tr>
            </table>
            <br>
            <p><strong>Product Dealing-</strong> <?php echo $shop[0]->product_dealing ?></p>
            <p><strong>Brand- </strong> <?php echo $shop[0]->brand_name ?></p>
                <p><strong>Description</strong></p>
            <p><?php echo $shop[0]->productdesc; ?></p>
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
                        <h3 class="filter-heading text-center">Business Rating</h3>
                        <div class="rating">
                            <?php
                            $items = array();
                            $tyy = "";
                            foreach ($rating as $ratingitmes){
                                $items[] = $ratingitmes->rating;
                                ?>
                           <?php }?>
                            <?php
                            $totalrating = array_sum($items);
                            $totalCount = count($rating);

                            $sum = $totalrating/$totalCount;
                            if($rating[0]->rating=="")
                            {
                                $starpath = '/local/images/nostar.png';
                            }
                            else {
                                $starpath = '/local/images/'.$rating[0]->rating.'star.png';
                            }
                            ?>
                                <span>

                                    <?php echo $sum ?>
                                </span>
                                <img src="<?php echo $url.$starpath;?>" class="star_rates" alt="rated <?php if($rating[0]->rating==""){ echo "0"; } else
                                    { echo $rating[0]->rating; }?>
                                        stars" title="rated <?php if($rating[0]->rating==""){ echo "0"; }
                                        else { echo $rating[0]->rating; }?> stars" />  - &nbsp;


                                <?php  echo $rating_count;?> Users
                            <?php

                            ?>

                        </div>


                    </div>
                </div>

                <?php } ?>

                        <?php



                    $var = 100;
                    $var2 = $rating_count;

                    if($var2 != 0)
                    {
                        $res = ( $var / $var2);
                        $test = round($res, 1); // 66.7
                    }



                    ?>

                    <?php
                    $items = array();
                    foreach ($rating as $ratingitmes){


                        $items[] = $ratingitmes->rating;


                        ?>
                    <?php }?>


                    <div class="row">
                        <div class="col-md-5">
                            <p style="float:left; font-weight: bold;">
                                <span>Excelient </span>

                        <?php
                        if (in_array("5", $items))
                        {
                            echo "(1)";
                        }
                        else
                        {
                            echo "(0)";
                        }

                        ?>


                        &nbsp;&nbsp; </p></div>
                        <div class="col-md-7">
                    <?php
                    if (in_array("5", $items))
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width:'.$test.'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }
                    else
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }

                    ?>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-5">
                            <p style="float:left; font-weight: bold;">
                                <span>Good</span>

                        <?php
                        if (in_array("4", $items))
                        {
                            echo "(1)";
                        }
                        else
                        {
                            echo "(0)";
                        }

                        ?>


                        &nbsp;&nbsp; </p></div>
                    <div class="col-md-7">
                    <?php
                    if (in_array("4", $items))
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-rating4" role="progressbar" style="width:'.$test.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }
                    else
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-rating4" role="progressbar" style="width: 0" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }

                    ?>
                    </div>
                    </div>






                    <div class="row">
                        <div class="col-md-5">
                   <p style="float:left; font-weight: bold;">
                                <span>Average</span>

                        <?php
                        if (in_array("3", $items))
                        {
                            echo "(1)";
                        }
                        else
                        {
                            echo "(0)";
                        }

                        ?>


                        &nbsp;&nbsp; </p></div>

                        <div class="col-md-7">
                    <?php
                    if (in_array("3", $items))
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-rating3" role="progressbar" style="width:'.$test.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }
                    else
                    {
                        echo ' <div class="progress">
                        <div class="progress-bar bg-rating3" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }

                    ?>
                        </div>
                    </div>







                    <div class="row">
                        <div class="col-md-5">
                            <p style="float:left; font-weight: bold;">
                                <span>bad</span>
                        <?php
                        if (in_array("2", $items))
                        {
                            echo "(1)";
                        }
                        else
                        {
                            echo "(0)";
                        }

                        ?>


                        &nbsp;&nbsp; </p></div>

                <div class="col-md-7">
                    <?php
                    if (in_array("2", $items))
                    {
                        echo '
                    <div class="progress">
                        <div class="progress-bar bg-rating2" role="progressbar" style="width:'.$test.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }
                    else
                    {
                        echo '
                    <div class="progress">
                        <div class="progress-bar bg-rating2" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }

                    ?>
                </div>
                    </div>







                    <div class="row">
                        <div class="col-md-5">
                            <p style="float:left; font-weight: bold;">
                                <span>Very Bad</span>
                        <?php

                        if (in_array("1", $items))
                        {
                            echo "(1)";
                        }
                        else
                        {
                            echo "(0)";
                        }


                        ?>

                        &nbsp;&nbsp; </p></div>

                <div class="col-md-7">
                    <?php

                    if (in_array("1", $items))
                    {
                        echo '<div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width:'.$test.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }
                    else
                    {
                        echo '<div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                    }


                    ?>
                </div>
                    </div>









            </div>




            <?php if(Auth::check()) { ?>
            <p class="pt-10">Contact No-

                <?php echo $shop[0]->shop_phone_no ?>

            </p>
            <p>Email- <?php echo $shop[0]->seller_email ?></p>

            <?php }else{?>

            <p class="pt-10">Contact No- xxxxxxxxxx</p>
            <p>Email- xxx@x.com</p>

        <?php }?>


            <a href="<?php echo $url;?>/contactseller/<?php echo $shop[0]->id;?>/<?php echo $shop[0]->user_id;?>" class="btn btn-warning btn-lg post-btn">Contact Seller</a>
        </div>


            <div class="row">


                    <div class="clearfix"></div>
            <div class="gallery-filter">
                    <ul class="nav nav-tabs" id="myTab">

                        <?php foreach ($shop_product as $products) {


                        $allsubcategory = DB::table('subsuperservice')->where('id', '=', $products->supersubcategory_id)->get();
                        ?>
                            @if(!$allsubcategory->isEmpty())
                                <li class=""><a href="#<?php  echo $allsubcategory[0]->subsupername ?>" class="productCategory"  shop_id="<?php echo $products->shop_id ?>" data="<?php echo $allsubcategory[0]->id ?>" data-toggle="tab"><?php echo $allsubcategory[0]->subsupername ?></a></li>
                            @else
                            @endif



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
                    <?php
                    $url = URL::to("/");
                    $userphoto="/userphoto/";
                    $path ='/local/images'.$userphoto.$newrating->photo;
                    if($newrating->photo!=""){?>
                    <img src="<?php echo $url.$path;?>" class="img-responsive" alt="">
                    <?php } else { ?>
                    <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" alt="">
                    <?php } ?>

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
                    <hr>
                <?php } ?>
                <?php } ?>

            </div>

            <div class="col-md-4 review-info1 bd-left">
                <h3 class="review-heading text-center"><b>You can also check-</b></h3>

                <?php foreach ($checkshop as $checkshops) {?>

                <div>

                    <?php $shopphoto="/shop/";
                    $paths ='/local/images'.$shopphoto.$checkshops->profile_photo;
                    if($checkshops->profile_photo!=""){?>
                    <img src="<?php echo $url.$paths;?>">

                <?php } else { ?>

                <img src="<?php echo $url.'/local/images/nophoto.jpg';?>">


            <?php } ?>


                        <a href="<?php echo $url; ?>/vendor/<?php echo $checkshops->name;?>/<?php echo $checkshops->supersubcategory_id;?>"><h3><strong><?php echo $checkshops->shop_name; ?></strong></h3></a>
                        <p><strong>Location-</strong> <?php echo $checkshops->city ?></p>
                    <p><b>250 Profile Views</b></p>
                    <p><b>Nature of Business-</b> <?php echo $checkshops->nature_of_business ?></p>
                    <p><b>Product Dealing-</b><?php echo $checkshops->product_dealing ?></p>
                    <p><b>Brand-</b> <?php echo $checkshops->brand_name ?></p>
                </div>
                <hr>
                <?php } ?>


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
        var self= $(this); //Store the refence in another variable like


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
                       swal("Unpinned Successfully!");
                       self.html('Pinned');

                   }else if(data.success==='true'){
                       swal("Pinned Successfully!");
                       self.html('Unpinned');

                   }

            }
        });

    });



        $('.productCategory').on('click', function() {
            src = "{{ route('getproduct') }}";
            var userId = $(this).attr("data");
            var shop_id = $(this).attr("shop_id");

            $.ajax({
                type: 'GET',
                url: src,
                data: {
                    subid : userId,
                },
                    success: function(data) {
                        $('#shopProfile').html(data);
                    }
        });
        });







</script>
</body>




</html>
