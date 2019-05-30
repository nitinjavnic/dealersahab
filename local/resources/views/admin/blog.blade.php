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

    <?php $url = URL::to("/"); ?>


    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->






            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Blog</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div align="right">
                        <?php if(config('global.demosite')=="yes"){?>
                        <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Service</a>
                        <?php } else { ?>
                        <a href="<?php echo $url;?>/admin/addblog" class="btn btn-primary">Add Blog</a>
                        <?php } ?>
                        <div class="x_content">


                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Name</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($blog as $service) { ?>


                                <tr>
                                    <?php
                                    $servicephoto="/blogphoto/";
                                    $path ='/local/images'.$servicephoto.$service->photo;
                                    if($service->photo!=""){
                                    ?>
                                    <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
                                    <?php } else { ?>
                                    <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="70"></td>
                                    <?php } ?>
                                    <td><?php echo $service->blog_titile;?></td>


                                    <td>
                                        <?php if(config('global.demosite')=="yes"){?>
                                        <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                        <?php } else { ?>
                                        <a href="<?php echo $url;?>/admin/editblog/{{ $service->id }}" class="btn btn-success">Edit</a>
                                        <?php } ?>
                                        <?php if(config('global.demosite')=="yes"){?>
                                        <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
                                        <?php } else { ?>
                                        <a href="<?php echo $url;?>/admin/blog/{{ $service->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>

                                            <?php if($service->is_active==1){ ?>
                                            <a href="<?php echo $url;?>/admin/activeblog/{{ $service->id }}" class="btn btn-info">Active</a>

                                        <?php }else if($service->is_active==0){ ?>
                                            <a href="<?php echo $url;?>/admin/activeblog/{{ $service->id }}" class="btn btn-info">Deactive</a>
                                              <?php } ?>



                                        <?php } }?>
                                    </td>
                                </tr>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>







            </div>
            <!-- /page content -->

            @include('admin.footer')
        </div>
    </div>



</body>
</html>
