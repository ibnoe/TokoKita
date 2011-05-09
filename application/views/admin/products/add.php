<h2>Tambah Produk</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/products/add') ?>
SKU : <?php echo form_input('sku',  set_value('sku'))?><br/>
Nama : <?php echo form_input('name', set_value('name')); ?><br/>
Harga : <?php echo form_input('price', set_value('price'));?><br/>
Stok : <?php echo form_input('stock', set_value('stock'));?><br/>
Deskripsi : <?php echo form_textarea('description', set_value('description')); ?><br/>
Kategory : <?php echo form_dropdown('category_id', $categories);?><br/>
Status : <?php echo form_dropdown('status', $status);?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>
