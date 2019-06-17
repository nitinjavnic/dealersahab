<!DOCTYPE html>
<html lang="en">
<?php $google_id = 10;
$google = DB::table('pages')
    ->where('page_id', '=', $google_id)
    ->get(); ?>



<script type="text/javascript">

    <?php echo $google[0]->page_desc ?>;

</script>
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

            <h3 class=" heading-0">Add Business Details</h3>
            <div class="panel-body">
        <div class="clearfix"></div>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('addbusiness') }}" id="formID" enctype="multipart/form-data">
            {{ csrf_field() }}


            <input type="hidden" name="editid" value="22">


            <div class="row profile shop">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name" class="col-md-12">Nature of Business <span class="require">*</span></label>

                        <div class="col-md-12">
                            <input id="shop_name" type="text" class="form-control validate[required] text-input" name="nature" value="" autofocus="">


                        </div>
                    </div>





                    <div class="form-group">
                        <label for="name" class="col-md-12">Business Logo <span class="require">*</span></label>

                        <div class="col-md-12">
                            <input id="shop_country" type="file" class="form-control validate[required] text-input" name="shop_logo" value="">


                        </div>
                    </div>





                    <div class="form-group">
                        <label for="name" class="col-md-12">Legal status of firm<span class="require">*</span></label>

                        <div class="col-md-12">
                            <input id="shop_phone_no" type="text" class="form-control validate[required] text-input" name="legal" value="">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-12">Category<span class="require">*</span></label>

                        <div class="col-md-12">
                            <select id="change_category" class="form-control validate[required]" name="service" required="">

                                <option value="">Select Category</option>

                            <?php foreach($service as $service){ ?>

                                <option value="<?php echo $service->id ?>"><?php echo $service->name ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-12">SubCategory<span class="require">*</span></label>

                        <div class="col-md-12">
                            <select id="change_category" class="form-control validate[required]" name="subservice" required="">
                                <option value="">Select SubCategory</option>

                            <?php foreach ($subservices as $subservices){?>
                                <option value="<?php echo $subservices->subid ?>"><?php echo $subservices->subname ?></option>
                                <?php }?>
                            </select>

                        </div>
                    </div>

                    <div class="webheight"></div>



                </div>



                <div class="col-md-6 moves20">



                    <div class="form-group">
                        <label for="name" class="col-md-12">Business Name <span class="require">*</span></label>

                        <div class="col-md-12">
                            <input id="shop_address" type="text" class="form-control validate[required] text-input" name="businessName" value="">


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
                        <label for="name" class="col-md-12">SuperSub Category<span class="require">*</span></label>

                        <div class="col-md-12">
                            <select id="change_category" class="form-control validate[required]" name="superSubservice" required="">
                                <option value="">Select SuperSub Category</option>

                            <?php foreach ($subsuperservice as $subsuperservice) {?>

                                <option value="<?php echo $subsuperservice->id ?>"><?php echo $subsuperservice->subsupername ?></option>

                                <?php }?>

                            </select>

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