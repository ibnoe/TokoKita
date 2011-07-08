<div class="cart">
    <div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/cart.gif" alt="" title="" /></span>Keranjang</div>
    <div class="home_cart_content">
       <?php echo $this->cart->total_items()?> | <span class="red">Total: <?php echo $this->cart->total()?></span>
    </div>
    <a href="<?php echo base_url()?>index.php/carts" class="view_cart">Lihat</a>

</div>