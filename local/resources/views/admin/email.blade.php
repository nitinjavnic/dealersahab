<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.title')

    @include('admin.style')


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('admin.sitename');

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
            @include('admin.menu')




            <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
    @include('admin.top')




    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->






            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

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

                                <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.addemail') }}" enctype="multipart/form-data" novalidate>


                                {{ csrf_field() }}
                                <span class="section">Send Email</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">Role <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="selectrole" class="form-control col-md-7 col-xs-12 fn_school_id" name="role" id="#" required="required">
                                            <option value="">--Select--</option>
                                            <option value="2">Seller</option>
                                            <option value="0">Customer</option>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">User <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12 fn_school_id" name="users" id="sellerppend" required="required">

                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Subject <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="subject" id="subject" value="" placeholder="Subject" required="required" type="text" autocomplete="off">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Email Body <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="body" id="body" required="required" placeholder="Email Body"> </textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Attachment</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <input type="file" name="photo">
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="#" class="btn btn-primary">Cancel</a>
                                        <input type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>















            <!-- /page content -->

            @include('admin.footer')
        </div>
    </div>
    </div>

<script>
    jQuery(document).ready(function(){
        src = "{{ route('findRole') }}";
        $("#selectrole").change(function() {
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: src,
                data: {
                    id : id
                },
                success: function(data) {
                    if(data.error=='No Result Found'){
                        $("#subsuperservice").append("<option>" + 'No Result Found' + "</option>");
                    }else {
                        $.each(data, function (index,value) {
                            $("#sellerppend").append("<option value="+ value.value.id +">" + value.value.name + "</option>");

                        });
                    }
                }


            });
        });
    });

</script>

</body>
</html>
