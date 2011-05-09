<h2>Tambah Produk</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/products/edit') ?>
<?php echo form_hidden('id', $product['id']); ?>
SKU : <?php echo form_input('sku', set_value('sku', isset($product['sku']) ? $product['sku'] : '')) ?><br/>
Nama : <?php echo form_input('name', set_value('name', isset($product['name']) ? $product['name'] : '')); ?><br/>
Harga : <?php echo form_input('price', set_value('price', isset($product['price']) ? $product['price'] : '')); ?><br/>
Stok : <?php echo form_input('stock', set_value('stock', isset($product['stock']) ? $product['stock'] : '')); ?><br/>
Deskripsi : <?php echo form_textarea('description', set_value('description', isset($product['description']) ? $product['description'] : '')); ?><br/>
Kategory : <?php echo form_dropdown('category_id', $categories, $product['category_id']); ?><br/>
Status : <?php echo form_dropdown('status', $status, $product['status']); ?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>
