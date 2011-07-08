<?php $products = $this->front_library->getNewProducts()?>

<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet2.gif" alt="" title="" /></span>Buku Baru</div> 

<?php if($products):?>
<?php foreach($products as $product):?>
<div class="new_products">

    <div class="new_prod_box">
        <a href="<?php echo base_url()?>index.php/products/detail/<?php echo $product['permalink']?>"><?php echo $product['name']?></a>
        <div class="new_prod_bg">
            <span class="new_icon"><img src="<?php echo base_url() ?>public/front/images/new_icon.gif" alt="<?php echo $product['name']?>" title="<?php echo $product['name']?>" /></span>
            <a href="<?php echo base_url();?>index.php/products/detail/<?php echo $product['permalink'];?>"><img src="<?php echo base_url() ?>public/products/thumb/<?php echo $product['thumb']?>" alt="" title="" class="thumb" border="0" /></a>
        </div>           
    </div>          

</div> 
<?php endforeach;?>
<?php endif;?>