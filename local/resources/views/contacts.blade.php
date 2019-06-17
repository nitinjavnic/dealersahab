<!DOCTYPE html>
<html lang="en">
<head>



    @include('style')

    <?php $google_id = 10;
    $google = DB::table('pages')
        ->where('page_id', '=', $google_id)
        ->get(); ?>



    <script type="text/javascript">

        <?php echo $google[0]->page_desc ?>;

    </script>



</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->











<div class="clearfix"></div>





<div class="video">
    <div class="clearfix"></div>

    <div class="container">

        <div class="height30"></div>
        <div class="row">
                <div class="col-md-4 ">

                </div>

                <div class="col-md-4 ">
                    <div class="panel panel-default border-shadow">
                        <h3 class=" heading-0">Contact Us</h3>
                        <div class="panel-body">
                    <form class="form-horizontal " role="form" method="POST" action="{{ route('contact') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-md-12 cform padd-0">
                            <br/>
                            <div class="col-lg-12 col-md-12 col-sm-12 padd-0">
                                <label>Name<span class="star">*</span></label>
                                <input type="text" value=""  class="form-control validate[required] text-input" id="name" name="name" >
                            </div>
                            <br/>
                            <div class="col-lg-12 col-md-12 col-sm-12 padd-0">
                                <label>Email<span class="star">*</span> </label>
                                <input type="text" value=""  class="form-control validate[required,custom[email]] text-input" id="email" name="email" >
                            </div>
                            <br/>
                            <div class="col-lg-12 col-md-12 col-sm-12 padd-0">
                                <label>Phone No<span class="star">*</span></label>
                                <input type="text" value=""  class="form-control validate[required] text-input" id="phone_no" name="phone_no" >
                            </div>
                            <br/>
                            <div class="col-lg-12 col-md-12 col-sm-12 padd-0">
                                <label>Message<span class="star">*</span> </label>
                                <input type="text" value=""   class="form-control validate[required] text-input" id="msg" name="msg">
                            </div>
                                <br/>
                            <div class="col-lg-12 col-md-12 col-sm-12 padd-0">
                                <input type="submit" class="btn btn-primary" value="Send">
                            </div>

                        </div>
                    </form>

                        </div>
                        </div>
                </div>

                <div class="col-md-4">

                </div>

            </div>




        </div>

    </div>





<div class="clearfix"></div>


@include('footer')
<?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
    </script>
    </div>
<?php } ?>
</body>
</html>