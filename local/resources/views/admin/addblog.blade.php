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

                        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.addblog') }}" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            <span class="section">Add Blog</span>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="blog_titile" value="{{ old('blog_titile') }}" required="required" type="text">
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Article Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="article_name" value="{{ old('blog_titile') }}" required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">keywords<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="keywords" value="{{ old('blog_titile') }}" required="required" type="text">
                                </div>
                            </div>




                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea id="editor" name="blog_text" value=""></textarea>



                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <textarea id="editor1" name="full_description" value=""></textarea>


                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Blog Image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12"><br/><br/><span> (Size is : 100px X 100px)</span>

                                    @if ($errors->has('photo'))
                                        <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <?php $url = URL::to("/"); ?>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo $url;?>/admin/blog" class="btn btn-primary">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
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

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


</body>
</html>
