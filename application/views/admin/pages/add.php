<h2>Tambah Halaman</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/pages/add') ?>
Judul : <?php echo form_input('title', set_value('title')); ?><br/>
Isi : <?php echo form_textarea('body', set_value('body')); ?><br/>
Status : <?php echo form_dropdown('status',$status) ?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>
