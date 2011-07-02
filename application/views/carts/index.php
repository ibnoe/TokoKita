<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet1.gif" alt="" title="" /></span>Keranjang Belanja</div>
<?php if ($this->session->flashdata('message')): ?>
    <?php echo $this->session->flashdata('message'); ?>
<?php endif ?>
<div class="feat_prod_box_details">

    <table class="cart_table">
        <tr class="cart_title">
            <td>Cover</td>
            <td>Nama Buku</td>
            <td>Qty</td>
            <td>Harga</td>
            <td>Total</td>
            <td>Aksi</td>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>

            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

            <tr>
                <td> 
                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                            <img src="<?php echo base_url() ?>public/products/thumb/<?php echo $option_value; ?>" title="<?php echo $items['name']; ?>" alt="<?php echo $items['name']; ?>"/>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </td>
                <td><?php echo $items['name']; ?></td>
                <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td><a href="<?php echo base_url()?>index.php/carts/delete/<?php echo $items['rowid']?>">Hapus</a></td>
            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="4" class="cart_total"><span class="red">TOTAL:</span></td>
            <td><?php echo $this->cart->format_number($this->cart->total()); ?></td>                
        </tr>                  

    </table>
    <a href="#" class="continue">&lt; continue</a>
    <a href="#" class="checkout">checkout &gt;</a>




</div>	






<div class="clear"></div>
