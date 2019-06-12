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

        @if(Session::has('success'))

            <div class="alert alert-success">

                {{ Session::get('success') }}

            </div>

        @endif




        @if(Session::has('error'))

            <div class="alert alert-danger">

                {{ Session::get('error') }}

            </div>

        @endif
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








                            <div class="webheight"></div>

                        </div>



                        <div class="col-md-6 moves20">



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
                                <label for="name" class="col-md-12">Brand Name<span class="require">*</span></label>

                                <div class="col-md-12">
                                    <input id="product_name" type="text" class="form-control validate[required] text-input" name="brand_name" value="">


                                </div>
                            </div>



                            <div class="form-group">
                                <label for="name" class="col-md-12">Select Seller Type<span class="require">*</span></label>

                                <div class="col-md-12">


                                    <select id="change_category" class="form-control validate[required]" name="sellertype" required="">

                                        <option value="">Select Seller Type</option>
                                        <option value="Manufacturer">Manufacturer</option>
                                        <option value="Dealer">Franchises/Dealer</option>
                                        <option value="Wholesaler">Wholesaler/Trader</option>
                                        <option value="Distributor">Supplier/Distributor</option>


                                    </select>


                                </div>
                            </div>


                        </div>




                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="name" class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;  Business Description<span class="require">*</span></label>

                            <div class="col-md-12">

                                <textarea id="editor" name="productdesc"></textarea>


                            </div>
                        </div>
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
<script type="text/javascript">

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );



</script>



@include('footer')
</body>
</html>