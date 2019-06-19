<?php $url = URL::to("/");?>

<?php foreach($subsearches as $shop){

?>
<div class="row review-point ">
    <div class="col-md-7 company-info ">

        <?php
        $shopphoto="/shop/";
        $npaths ='/local/images'.$shopphoto.$shop->profile_photo;
        ?>

        <img src="<?php echo $url.$npaths;?>" alt="" >
            <a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>"><h3><strong><?php echo $shop->shop_name; ?></strong></h3></a>
        <p><b>Address-</b> <?php echo $shop->address; ?><br><span><b>250 Profile Views</b></span></p>
        <p><b>  Nature of Business-</b> <?php echo $shop->sellertype; ?></p>
        <p><b>Product Dealing-</b> <?php echo $shop->product_dealing; ?></p>
        <p><b>Brand-</b> <?php echo $shop->brand_name; ?></p>
        <a href="<?php echo $url; ?>/vendor/<?php echo $shop->name;?>/<?php echo $shop->supersubcategory_id;?>" class="btn btn-warning">View Details</a>
    </div>
    <div class="col-md-5">
        <div class="well well-sm">
            <p style="float:left; font-weight: bold;">
            <?php
            if($shop->rating=="")
            {
                $starpath = '/local/images/nostar.png';
            }
            else {
                $starpath = '/local/images/'.$shop->rating.'star.png';
            }
            ?>




            <?php
            $rating_count = DB::table('rating')
                ->where('rshop_id', '=', $shop->shop_id)
                ->count();

            $var = 100;
            $var2 = $rating_count;

            if($var2 != 0)
            {
                $res = ( $var / $var2);
                $per = round($res, 1); // 66.7
            }




            $rating = DB::table('rating')
                ->leftJoin('users', 'users.email', '=', 'rating.email')
                ->where('rshop_id', '=', $shop->shop_id)
                ->get();

            $items = array();
            $tyy = "";

            foreach ($rating as $ratingitmes){
                $items[] = $ratingitmes->rating;
                $totalrating = array_sum($items);
                $totalCount = count($rating);
                $sum = $totalrating/$totalCount;

                $tyy .= $totalrating/$totalCount;

                ?>
                                <?php }?>

            <div class="rating" >
                <span><?php echo $tyy; ?></span><img src="<?php echo $url.$starpath;?>" alt="rated <?php if($shop->rating==""){ echo "0"; } else { echo $shop->rating; }?> stars" class="star_rates" />

            </div>


            <div class="row">
                <div class="col-md-5">
                    <p style="float:left; font-weight: bold;">
                        <span>Excelient</span>
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


                        &nbsp;&nbsp; </p>
                </div>
                <div class="col-md-7">
                    <?php
                    if (in_array("5", $items))
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating5 " role="progressbar" style="width:'.$per.'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }
                    else
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating5 " role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                        echo '<div class="progress">
										<div class="progress-bar bg-rating4" role="progressbar" style="width:'.$per.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }
                    else
                    {
                        echo '<div class="progress">
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
                            echo '(0)';
                        }

                        ?>
                        &nbsp;&nbsp; </p></div>

                <div class="col-md-7">
                    <?php
                    if (in_array("3", $items))
                    {
                        echo '	<div class="progress">
										<div class="progress-bar bg-rating3" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }
                    else
                    {
                        echo '<div class="progress">
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
                        &nbsp;&nbsp; </p>
                </div>

                <div class="col-md-7">

                    <?php
                    if (in_array("2", $items))
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating2" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }
                    else
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating2" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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

                        &nbsp;&nbsp; </p>
                </div>


                <div class="col-md-7">
                    <?php

                    if (in_array("1", $items))
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating1" role="progressbar" style="width:'.$per.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }
                    else
                    {
                        echo '<div class="progress">
										<div class="progress-bar bg-rating1" role="progressbar" style="width: 0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>';
                    }


                    ?>
                </div>
            </div>



        </div>

    </div>
</div>
<?php } ?>
