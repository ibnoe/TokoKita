<div class="crumb_nav">
    <a href="<?php echo base_url(); ?>">home</a> &gt;&gt; Buku
</div>
<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet1.gif" alt="" title="" /></span>Buku</div>

<div class="new_products">

    <?php if ($products): ?>
        <?php foreach ($products as $product): ?>
            <div class="new_prod_box">
                <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><?php echo $product['name'] ?></a>
                <div class="new_prod_bg">
                    <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb'] ?>" alt="<?php echo $product['name'] ?>" title="<?php echo $product['name'] ?>" class="thumb" border="0" /></a>
                </div>           
            </div>  
        <?php endforeach; ?>
    <?php endif; ?>



    <div class="pagination">
        <?php echo $pagination; ?>

    </div>  

</div> 


<div class="clear"></div>
