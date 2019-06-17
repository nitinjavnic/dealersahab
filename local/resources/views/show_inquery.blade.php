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

<?php $url = URL::to("/"); ?>




<div class="video">
    <div class="clearfix"></div>
    <div class="">
        <div class="col-md-12 fancy" align="center"><h2>Manage Enquiry</h2></div>
    </div>
    <div class="container">
        <div class="col-md-12 emailer">
            <div class="clearfix"></div>
            <div class="clearfix"></div>

            <table class="table table-sm-responsive enqu-note">


                <tbody>
                <tr>
                    <th>Name</th>
                    <th>Enquery</th>
                    <th>Phone No.</th>
                    <th>Action</th>
                </tr>
            <?php foreach ($contact_seller as $contact_seller){ ?>
                <tr>
                    <td><?php echo $contact_seller->name ?> </td>
                    <td> <?php echo $contact_seller->query ?></td>
                    <td> <?php echo $contact_seller->phone ?></td>
                    <td><a href="<?php echo $url;?>/deleteContact/{{ $contact_seller->user_id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')" role="button" aria-pressed="true">Delete</a></td>
                </tr>
                <?php }?>
                </tbody>
            </table>


        </div>


    </div>
</div>
</div>




<div class="clearfix"></div>
<div class="clearfix"></div>

@include('footer')
</body>
</html>