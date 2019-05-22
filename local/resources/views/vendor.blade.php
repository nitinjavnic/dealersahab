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

    <div class="container block-company">
        <div class="row ">
            <div class="col-md-2 col-4">

                <?php $shopphoto="/shop/";
                $paths ='/local/images'.$shopphoto.$shop[0]->profile_photo;
                if($shop[0]->profile_photo!=""){?>
                <img src="<?php echo $url.$paths;?>" class="img-fluid company-profile"></div>

            <?php } else { ?>

            <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-fluid company-profile"></div>


        <?php } ?>


        <div class="col-md-6 col-8">
            <h2><?php echo $shop[0]->shop_name;?></h2>
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
    $starpath