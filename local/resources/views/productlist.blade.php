<?php $url = URL::to("/");?>

<?php foreach($data as $product){?>
    <div class="col-md-3 pt-30">
        <?php

        $servicephoto="/productimage/";
        $path ='/local/images'.$servicephoto.$product->photo;
        if($product->photo!=""){
            ?>
            <img src="<?php echo $url.$path;?>">

		   <?php } else {?>


        <img src="<?php echo $url.'/local/images/noimage.jpg';?>">

        <?php }?>

    <a href="<?php echo $url; ?>/productDetail/<?php echo $product->id;?>/<?php echo $product->shop_id ?>" class=""><?php echo $product->product_name ?></a>
</div>

<?php }?>