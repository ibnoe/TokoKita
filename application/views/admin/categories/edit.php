<h2>Edit Kategori</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/categories/edit') ?>
<?php echo form_hidden('id', $category['id']); ?>
Nama : <?php echo form_input('name', isset($category['name']) ? $category['name'] : ''); ?><br/>
Deskripsi : <?php echo form_textarea('description', isset($category['description']) ? $category['description'] : ''); ?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>
