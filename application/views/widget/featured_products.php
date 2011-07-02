
<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet1.gif" alt="" title="" /></span>Featured books</div>
<?php $products = $this->front_library->getFeaturedProducts(); ?>
<?php if ($products): ?>
    <?php foreach ($products as $product): ?>
        <div class="feat_prod_box">

            <div class="prod_img"><a href="<?php echo base_url(); ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb'] ?>" alt="<?php echo $product['name'] ?>" title="<?php echo $product['name'] ?>" border="0" /></a></div>
            <div class="prod_det_box">
                <div class="box_top"></div>
                <div class="box_center">
                    <div class="prod_title"><?php echo $product['name'] ?></div>
                    <div class="details"><?php echo $product['description'] ?></div>
                    <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink'] ?>" class="more">- lebih detail -</a>
                    <div class="clear"></div>
                </div>

                <div class="box_bottom"></div>
            </div>    
            <div class="clear"></div>

        </div>	
    <?php endforeach; ?>
<?php endif; ?>