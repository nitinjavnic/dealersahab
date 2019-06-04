<!DOCTYPE html>
<html lang="en">
<head>



    @include('style')





</head>
<body>

<?php

$url = URL::to("/"); ?>

<!-- fixed navigation bar -->
@include('header')

<!-- slider -->











<div class="clearfix"></div>





<div class="video">
    <div class="clearfix"></div>
    <div class="container">
        <div class="clearfix"></div>
        <div class="panel panel-default border-shadow">
            <div class="panel-heading">Add Business Details</div>
            <div class="panel-body">
                <div class="clearfix"></div>

                <form class="form-horizontal" role="form" method="POST" action="{{ route('editshop') }}" id="formID" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <input type="hidden" name="editid" value="<?php echo $requestid;?>">

                    <div class="row profile shop">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-md-12">Business Name <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_name" type="text" class="form-control validate[required] text-input" name="shop_name" value="<?php echo $editshop[0]->shop_name;?>" autofocus="">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="name" class="col-md-12">Business Logo <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_country" type="file" class="form-control col-md-7 col-xs-12" name="shop_profile_photo" value="">


                                </div>
                            </div>



                            <?php
                            $servicephoto="/shop/";
                            $path ='/local/images'.$servicephoto.$editshop[0]->profile_photo;
                            if($editshop[0]->profile_photo!=""){
                            ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.$path;?>" class="thumb " width="100" style="float:left" height="100">
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb " width="100" height="100" style="float:left">
                                </div>
                            </div>
                            <?php } ?>



                            <input type="hidden" name="current_photo" value="<?php echo $editshop[0]->profile_photo;?>">




                            <div class="form-group">
                                <label for="name" class="col-md-12">Address<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_address" value="<?php echo $editshop[0]->address;?>">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">State<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_state" value="<?php echo $editshop[0]->state;?>">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Pin Code<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_pin_code" value="<?php echo $editshop[0]->country;?>">


                                </div>
                            </div>




                            <div class="form-group">
                                <label for="name" class="col-md-12">Legal status of firm<span class="require">*</span></label>

                                <div class="col-md-12">


                                    <select id="change_category" class="form-control validate[required]" name="legal" required="">

                                        <option value="registered"<?php if($editshop[0]->legal_status == 'registered') { ?> selected="selected"<?php } ?>>registered</option>
                                        <option value="unregistered"<?php if($editshop[0]->legal_status == 'unregistered') { ?> selected="selected"<?php } ?>>unregistered</option>




                                    </select>




                                </div>
                            </div>

                            <div class="webheight"></div>

                        </div>



                        <div class="col-md-6 moves20">

                            <div class="form-group">
                                <label for="name" class="col-md-12">Nature of Business <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_address" type="text" class="form-control validate[required] text-input" name="nature" value="<?php echo $editshop[0]->nature_of_business;?>">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">Cover Image <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_country" type="file" class="form-control col-md-7 col-xs-12" name="shop_cover_photo" value="">


                                </div>
                            </div>


                            <?php
                            $servicephoto="/shop/";
                            $path ='/local/images'.$servicephoto.$editshop[0]->cover_photo;
                            if($editshop[0]->cover_photo!=""){
                            ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.$path;?>" class="thumb" width="100" style="float:left" height="100">
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100" style="float:left" height="100">
                                </div>
                            </div>
                            <?php } ?>


                            <input type="hidden" name="current_cover" value="<?php echo $editshop[0]->cover_photo;?>">







                            <div class="form-group">
                                <label for="name" class="col-md-12">City<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="shop_city" value="<?php echo $editshop[0]->city;?>">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Country<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="shop_country" value="<?php echo $editshop[0]->country;?>">


                                </div>
                            </div>




                            <div class="form-group">
                                <label for="name" class="col-md-12"> Year Of Establishment<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="establishment" value="<?php echo $editshop[0]->establishment;?>">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">GST Number <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="" type="text" class="form-control validate[required] text-input" name="gst" value="<?php echo $editshop[0]->gst_number;?>">


                                </div>
                            </div>




                        </div>




                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <a href="#" class="btn btn-primary radiusoff">
                                Reset
                            </a>


                            <button type="submit" class="btn btn-success radiusoff">
                                Update
                            </button>
                        </div>
                    </div>



                </form>
            </div>
        </div>







        <div class="height30"></div>
        <div class="row">





        </div>

    </div>
</div>


@include('footer')
</body>
</html>