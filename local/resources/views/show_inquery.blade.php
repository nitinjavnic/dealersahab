<!DOCTYPE html>
<html lang="en">
<head>



    @include('style')





</head>
<body>



<!-- fixed navigation bar -->
@include('header')

<!-- slider -->


<div class="clearfix"></div>





<div class="video">
    <div class="clearfix"></div>
    <div class="headerbg">
        <div class="col-md-12" align="center"><h1>Manage Enquiry</h1></div>
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
                    <td><a href="#!" class="btn btn-danger" role="button" aria-pressed="true">Delete</a></td>
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