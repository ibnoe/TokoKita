<h2>Tambah Kategori</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/categories/add') ?>
Nama : <?php echo form_input('name', set_value('name')); ?><br/>
Deskripsi : <?php echo form_textarea('description', set_value('description')); ?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>
