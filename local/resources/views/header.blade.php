<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
$setts = DB::table('settings')
    ->where('id', '=', $setid)
    ->get();


?>
<div class="navbar navbar-fixed-top <?php if($currentPaths=="index" or $currentPaths=="/"){?>homenav<?php } else {?>migrateshop_othernav<?php } ?> navbar-inverse" role="navigation">
    <div class="container topbottom">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="" href="<?php echo $url;?>">
                <?php if(!empty($setts[0]->site_logo)){?>

                <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>"  />
                <?php } else {?>
		   <?php echo $setts[0]->site_name;?>
		   <?php } ?>
            </a>
        </div>
        <span class="banner-add">

          <img src="{{asset('/local/images/dealers2.jpg')}}" alt="" class="img-responsive">
          </span>


        <div class="collapse navbar-collapse" id="b-menu-1">

            <ul class="nav navbar-nav navbar-right <?php if($currentPaths=="index" or $currentPaths=="/"){?>sangvish_homepage<?php } else {?>sangvish_otherpage<?php } ?>">
                <!--<li class="active"><a href="#">Join as a pro</a></li>-->
                <?php if (Auth::guest()) {?>


                <li><a href="<?php echo $url;?>/about">About Us</a></li>
                <li><a href="<?php echo $url;?>/blogList">Blog</a></li>

                <li><a href="<?php echo $url;?>/post">Post your Requirment</a></li>
                <li><a href="<?php echo $url;?>/register">List your Business</a></li>
                <li><a href="<?php echo $url;?>/contact">Contact Us</a></li>
                <li><a href="<?php echo $url;?>/register">Sign Up</a></li>
                <li><a href="<?php echo $url;?>/login">Login</a></li>

                <?php } else { ?>
                <li><a href="<?php echo $url;?>/about">About Us</a></li>
                <li><a href="<?php echo $url;?>/blogList">Blog</a></li>

                <li><a href="<?php echo $url;?>/post">Post your Requirment</a></li>
                <?php if(Auth::user()->admin==0) {
                    $mail = Auth::user()->email;
                    $mailcount = DB::table('shop')
                        ->where('seller_email', '=',$mail)
                        ->count();
                    ?>

                <li><a href="<?php if(empty($mailcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/editshop<?php } ?>">List your Business</a></li>



                <?php }else{ ?>

                <li><a href="<?php echo $url;?>/register">List your Business</a></li>

                <?php  }?>

                <li><a href="<?php echo $url;?>/contact">Contact Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}<b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <?php if(Auth::check()) { ?>
                        <?php if(Auth::user()->admin==1) {?>
                        <li><a href="{{ url('admin/') }}" target="_blank">Admin Dashboard</a></li>
                        <?php } ?>

                        <?php if(Auth::user()->admin==0) {?>
                        <li><a href="<?php echo $url;?>/dashboard">My Profile</a></li>
                        <li><a href="<?php if(empty($mailcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/editshop<?php } ?>">Become Seller</a></li>
                        <li><a href="<?php echo $url;?>/my_bookings">My Bookings</a></li>
                        <li><a href="<?php echo $url;?>/pinnedseller">Pinned Seller</a></li>
                            <li>
                                <?php if(config('global.demosite')=="yes"){?>
                                <a href="#" class="btndisable">
                                    Delete Account <span class="disabletxt" style="font-size:13px;">( <?php echo config('global.demotxt');?> )</span>
                                </a>
                                <?php } else { ?>

                                <a href="<?php echo $url;?>/delete-account" onclick="return confirm('Are you sure you want to delete your account?');">
                                    Delete Account
                                </a>
                                <?php } ?>
                            </li>



                        <?php } ?>


                        <?php if(Auth::user()->admin==2) {

                        $sellmail = Auth::user()->email;
                        $shcount = DB::table('shop')
                            ->where('seller_email', '=',$sellmail)
                            ->count();
                        ?>


                            <li><a href="<?php echo $url;?>/dashboard">Account Setting</a></li>
                        <li><a href="<?php if(empty($shcount)){?><?php echo $url;?>/addshop<?php } else { ?><?php echo $url;?>/editshop<?php } ?>">My Business</a></li>

                        <li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/services" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>My Product</a></li>

                            <li><a href="<?php echo $url;?>/myorder">My Order</a></li>
                            <li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/buyer_query" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>My Query</a></li>
                            <li><a href="<?php echo $url;?>/my_bookings">My Bookings</a></li>


                            <li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/pinnedseller" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>Pinned Seller</a></li>
                        <li><a href="#">Get Featured</a></li>
                            <li <?php if(empty($shcount)){?>class="disabled"<?php } ?>><a href="<?php echo $url;?>/delete-account"  onclick="return confirm('Are you sure you want to delete your account?');" <?php if(empty($shcount)){?>class="disabled"<?php } ?>>Delete Account</a></li>

                        <?php } ?>







                        <?php } ?>

                    </ul>

                </li>
                <?php } ?>
            </ul>
        </div> <!-- /.nav-collapse -->
    </div> <!-- /.container -->
</div> <!-- /.navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){
        $('#becomeseller').on('click', function() {
            src = "{{ route('becomeseller') }}";
            var userId = $(this).attr("data");
            var value = '2';
            $.ajax({
                type: 'GET',
                url: src,
                data: {
                    id : userId,
                    value : value,
                },
                success: function(data) {
                    console.log(data);if(data.success==='false'){

                        swal("You are already become a seller!");

                    }else if(data.success==='true'){
                        swal("Thanks! Now you are become a Seller");


                    }
                }
            });

        });
    });

</script>