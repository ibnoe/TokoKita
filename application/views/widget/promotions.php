<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet4.gif" alt="" title="" /></span>Promosi</div> 

<?php $products = $this->front_library->getDiscountedProducts(); ?>
<?php if ($products): ?>
    <?php foreach ($products as $product): ?>
        <div class="new_prod_box">

            <a href="<?php echo base_url(); ?>index.php/products/detail/<?php echo $product['permalink'] ?>"><?php echo $product['name']; ?></a>
            <div class="new_prod_bg">
                <span class="new_icon"><img src="<?php echo base_url(); ?>public/front/images/promo_icon.gif" alt="" title="" /></span>
                <a href="<?php echo base_url(); ?>index.php/products/detail/<?php echo $product['permalink'] ?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb'] ?>" alt="<?php $product['name'] ?>" title="<?php $product['name'] ?>" class="thumb" border="0" /></a>
            </div>           
        </div>          
    <?php endforeach; ?>
<?php endif; ?>