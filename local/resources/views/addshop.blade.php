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

                <form class="form-horizontal" role="form" method="POST" action="{{ route('addshop') }}" id="formID" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="editid" value="">


                    <div class="row profile shop">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-md-12">Business Name <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_name" type="text" class="form-control validate[required] text-input" name="shop_name" value="" autofocus="">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="name" class="col-md-12">Business Logo <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_country" type="file" class="form-control validate[required] text-input" name="shop_profile_photo" value="">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Address<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_address" value="">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">State<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_state" value="">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Pin Code<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="shop_pin_code" value="">


                                </div>
                            </div>




                            <div class="form-group">
                                <label for="name" class="col-md-12">Legal status of firm<span class="require">*</span></label>

                                <div class="col-md-12">


                                    <select id="change_category" class="form-control validate[required]" name="legal" required="">

                                        <option value="">Select Legal status</option>
                                        <option value="registered">Registered</option>
                                        <option value="unregistered">Unregistered</option>


                                    </select>


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">Product Dealing<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="product_dealing" type="text" class="form-control validate[required] text-input" name="product_dealing" value="">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Brand Name<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="product_name" type="text" class="form-control validate[required] text-input" name="product_name" value="">


                                </div>
                            </div>



                            <div class="webheight"></div>

                        </div>



                        <div class="col-md-6 moves20">

                            <div class="form-group">
                                <label for="name" class="col-md-12">Nature of Business <span class="require">*</span></label>

                                <div class="col-md-12">

                                    <select id="change_category" class="form-control validate[required]" name="nature" required="">

                                        <option value="">Select Business</option>
                                        <option value="Manufacturer">Manufacturer</option>
                                        <option value="Dealer">Dealer</option>
                                        <option value="Wholesaler">Wholesaler</option>
                                        <option value="Supplier">Supplier</option>


                                    </select>



                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">Cover Image <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_country" type="file" class="form-control validate[required] text-input" name="shop_cover_photo" value="">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">City<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="shop_city" value="">


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-12">Country<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="shop_country" value="">


                                </div>
                            </div>




                            <div class="form-group">
                                <label for="name" class="col-md-12"> Year Of Establishment<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="shop_pin_code" type="text" class="form-control validate[required] text-input" name="establishment" value="">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">GST Number <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="" type="text" class="form-control validate[required] text-input" name="gst" value="">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-md-12">Business Contact <span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="" type="text" class="form-control validate[required] text-input" name="shop_phone_no" value="">


                                </div>
                            </div>





                        </div>




                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <a href="http://localhost/dealerSahab/shop" class="btn btn-primary radiusoff">
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