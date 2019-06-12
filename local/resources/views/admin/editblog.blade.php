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

                        <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.editblog') }}" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            <span class="section">Edit Blog</span>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_titile">Blog Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="blog_titile" value="<?php echo $services[0]->blog_titile; ?>" required="required" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color:red;">
                                        <strong>That blog is already exists</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Article Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="article_name" value="<?php echo $services[0]->article_name; ?>" required="required" type="text">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">keywords<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="blog_titile" class="form-control col-md-7 col-xs-12"  name="keywords" value="<?php echo $services[0]->keywords; ?>" required="required" type="text">
                                </div>
                            </div>






                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Short Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea  name="blog_text" value=""><?php echo $services[0]->blog_text; ?></textarea>



                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <textarea id="editor1" name="full_description" value=""><?php echo $services[0]->full_description; ?></textarea>


                                </div>
                            </div>



                            <input type="hidden" name="id" value="<?php echo $services[0]->id; ?>">


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
                            <?php
                            $servicephoto="/blogphoto/";
                            $path ='/local/images'.$servicephoto.$services[0]->photo;
                            if($services[0]->photo!=""){
                            ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.$path;?>" class="thumb" width="100">
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="item form-group" align="center">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100">
                                </div>
                            </div>
                            <?php } ?>

                            <input type="hidden" name="currentphoto" value="<?php echo $services[0]->photo;?>">

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
        .create( document.querySelector( '#editor1' ), {
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


</body>
</html>
