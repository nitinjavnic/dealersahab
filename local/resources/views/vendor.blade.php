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
            <h2><?php echo $shop[0]->shop_name;?><a href="#" class="btn btn-success pin-seller " id="pinned">Pinned </a></h2>


            <p><strong>Location-</strong> <?php echo $shop[0]->address;?> <strong>Profile View</strong></p>
            <table class="text-center">
                <tr>
                    <td><strong>Nature of Business</strong></td>
                    <td><strong>Year of Estblishment</strong></td>
                </tr>
                <tr>
                    <td><?php echo $sellertype; ?></td>
                    <td>2010</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>legar status of Firm</strong></td>
                    <td><strong>GST NO.</strong></td>
                </tr>
                <tr>
                    <td>Manufecturer</td>
                    <td>2010</td>
                    <td></td>
                </tr>
            </table>
            <br>
            <p><strong>Product Dealing-</strong> Compressor,ac Freez Motor</p>
            <p><strong>Brand Company-</strong> Alg8i, Usha</p>
            <p>Concise description which, among other items of information, includes (1) firm's history, (2) number and quality of its human, financial, and physical resources (3) organizational and management structure, (4) past, current and anticipated performance, and (5) its reputation, and the standing of its goods or services.</p>
        </div>
        <div class="col-md-4 col-12">


            <?php foreach($rating as $newrating){?>

            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                            <?php echo $newrating->rating; ?>
                        </h1>


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
                            <img src="<?php echo $url.$starpath;?>" alt="rated <?php if($newrating->rating=="")
                            {
                                echo "0";
                            }
                            else {
                                echo $newrating->rating;
                            }
                            ?>
                                    stars" class="star_rates" />
                        </div>


                        <div>
                            <span class="glyphicon glyphicon-user"></span>47 Rating
                            <button type="button" class="btn btn-warning" name="submit">View Detail</button>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span><?php echo $newrating->rating; ?>    </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress progress-striped">
                                    <?php

                                    if($newrating->rating==5)
                                    {echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                       <span class="sr-only">80%</span>
                                    </div>';
                                    }
                                    if($newrating->rating==4)
                                    {echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                       <span class="sr-only">80%</span>
                                    </div>';
                                    }
                                    if($newrating->rating==3)
                                    {echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                       <span class="sr-only">80%</span>
                                    </div>';
                                    }

                                    if($newrating->rating==2)
                                    {echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                       <span class="sr-only">80%</span>
                                    </div>';
                                    }
                                    if($newrating->rating==1)
                                    {echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                       <span class="sr-only">80%</span>
                                    </div>';
                                    }
                                    ?>


                                </div>

                            </div>

                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>

                </div>
            </div>

            <?php }?>

                <p class="pt-10">Contanct no- 9876543210</p>
                <p>Email id- xyz@gmail.com</p>

                <a href="" class="btn btn-warning btn-lg post-btn">Post Your Requirement</a>

        </div>


            <div class="row">


                    <div class="clearfix"></div>
            <div class="gallery-filter">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#freez" data-toggle="tab">Freez</a></li>
                        <li class=""><a href="#Ac" data-toggle="tab" class="btn btn-primary"> Ac</a></li>
                        <li class=""><a href="#Cooler" data-toggle="tab"> Cooler</a></li>
                        <li class=""><a href="#Washing" data-toggle="tab">Washing </a></li>
                        <li class=""><a href="#Moter" data-toggle="tab">Motar </a></li>
                    </ul>

                    <div class="tab-content">


                        <div class="tab-pane active " id="freez">

                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056495.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056590.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="tab-pane" id="Ac">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056495.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056590.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Cooler">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056495.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056590.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Moter">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056495.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056590.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="gallery">
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056495.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056590.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                    <div class="col-md-3 pt-30">
                                        <img src="http://fabclap.com/local/images/gallery/1496056605.jpg" class="img-responsive">
                                        <a href="#" class="">Freez</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
            </div>





            </div>


        </div>







        <div class="row block-company1">

            <div class="col-md-8 company-info pb-20 pl-80 pr-20">


                <?php if($rating_count==0) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rating">
                            No Reviews
                        </div>

                    </div>
                </div>
                <?php } else { ?>

                <h3>
                    <span class="">Reviews</span></h3>
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

            <div class="col-md-4 company-info bd-left">
                <h3><u>You Can Also Check-</u></h3>
                <div>
                <img src="../img/banner.jpg" alt="" >
                <h3><strong>Dummy India Pvt. Ltd.</strong></h3>
                <p><strong>Location-Delhi</strong><span class="pl-10">250 Profile Views</span></p>
                <p><span> Nature of Business-Dealer</span></p>
                <p><span class="pl-10"> Product Dealing-Compressor,Piston,Tools</span></p>
                <p> <span class="pl-10"> Brand Company-Usha,Algi,Shakti,Kirlooskar</span></p>
                </div>
                <hr>

                <div>
                    <img src="../img/banner.jpg" alt="" >
                    <h3><strong>Dummy India Pvt. Ltd.</strong></h3>
                    <p><strong>Location-Delhi</strong><span class="pl-10">250 Profile Views</span></p>
                    <p><span> Nature of Business-Dealer</span></p>
                    <p><span class="pl-10"> Product Dealing-Compressor,Piston,Tools</span></p>
                    <p> <span class="pl-10"> Brand Company-Usha,Algi,Shakti,Kirlooskar</span></p>
                </div>
                <hr>

                <div>
                    <img src="../img/banner.jpg" alt="" >
                    <h3><strong>Dummy India Pvt. Ltd.</strong></h3>
                    <p><strong>Location-Delhi</strong><span class="pl-10">250 Profile Views</span></p>
                    <p><span> Nature of Business-Dealer</span></p>
                    <p><span class="pl-10"> Product Dealing-Compressor,Piston,Tools</span></p>
                    <p> <span class="pl-10"> Brand Company-Usha,Algi,Shakti,Kirlooskar</span></p>
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

<script>

    $('#pinned').on('click', function() {
                alert('hii')
    });

</script>
</body>




</html>
