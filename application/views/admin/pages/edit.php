<h2>Edit Halaman</h2>
<?php echo validation_errors() ?>
<?php echo form_open('admin/pages/edit') ?>
<?php echo form_hidden('id', $page['id']); ?>
Judul : <?php echo form_input('title', set_value('title', isset($page['title']) ? $page['title'] : '')); ?><br/>
Isi : <?php echo form_textarea('body', set_value('body', isset($page['body']) ? $page['body'] : '') ? $page['body'] : ''); ?><br/>
Status : <?php echo form_dropdown('status',$status,$page['status']) ?><br/>
<?php echo form_submit('Submit', 'Simpan') ?>
<?php echo form_close(); ?>


