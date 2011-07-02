<div class="crumb_nav">
    <a href="<?php echo base_url() ?>">home</a> &gt;&gt; <?php echo $product['name'] ?>
</div>
<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet1.gif" alt="" title="" /></span><?php echo $product['name'] ?></div>
<?php if ($this->session->flashdata('message')): ?>
    <?php echo $this->session->flashdata('message'); ?>
<?php endif ?>
<div class="feat_prod_box_details">
    <div class="prod_img"><a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb'] ?>" alt="<?php echo $product['name'] ?>" title="<?php echo $product['name'] ?>" border="0" /></a>
        <br /><br />
        <a href="<?php echo base_url() ?>public/products/medium/<?php echo $product['medium'] ?>" rel="lightbox"><img src="<?php echo base_url() ?>public/front/images/zoom.gif" alt="<?php echo $product['name'] ?>" title="<?php echo $product['name'] ?>" border="0" /></a>
    </div>

    <div class="prod_det_box">
        <div class="box_top"></div>
        <div class="box_center">
            <div class="prod_title">Detail</div>
            <div class="details"><?php echo $product['description'] ?></div>
            <div class="price"><strong>HARGA:</strong> <span class="red">IDR <?php echo $product['price'] ?></span></div>

            <a href="<?php echo base_url() ?>index.php/products/add_cart/<?php echo $product['permalink']; ?>" class="more"><img src="<?php echo base_url() ?>public/front/images/order_now.gif" alt="" title="" border="0" /></a>
            <div class="clear"></div>
        </div>

        <div class="box_bottom"></div>
    </div>    
    <div class="clear"></div>
</div>	


<div id="demo" class="demolayout">

    <ul id="demo-nav" class="demolayout">
        <li><a class="active" href="#tab1">Buku Terkait</a></li>
    </ul>

    <div class="tabs-container">


        <div style="display: none;" class="tab" id="tab1">
            <?php $relatedBooks = $this->front_library->getProductsByCategoryId($product['category_id']) ?>

            <?php if ($relatedBooks): ?>
                <?php foreach ($relatedBooks as $product): ?>
                    <div class="new_prod_box">
                        <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><?php echo $product['name'] ?></a>
                        <div class="new_prod_bg">
                            <a href="<?php echo base_url() ?>index.php/products/detail/<?php echo $product['permalink']; ?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb'] ?>" alt="<?php echo $product['name'] ?>" title="<?php echo $product['name'] ?>" class="thumb" border="0" /></a>
                        </div>           
                    </div>  
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="clear"></div>
        </div>	
    </div>
</div>

<div class="clear"></div>