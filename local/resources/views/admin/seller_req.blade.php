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
                        <h2>Seller Requirement</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div align="right">

                        <div class="x_content">


                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Requrement</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i=1;
                                foreach ($services as $service) { ?>


                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $service->name;?></td>
                                    <td><?php echo $service->phone;?></td>
                                    <td><?php echo $service->query;?></td>


                                </tr>
                                <?php $i++;} ?>

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
