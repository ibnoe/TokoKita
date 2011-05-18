<?php echo initialize_tinymce()?>
<h2>Tambah Kategori</h2>
<?php if (validation_errors ()): ?>
    <div class="error_box">
    <?php echo validation_errors(); ?>
</div>
<?php endif ?>
    <div class="form">
        <fieldset>
        <?php echo form_open('admin/categories/add', array('class' => 'niceform')) ?>
        <dl>
            <dt><label>Nama</label></dt>
            <dd><?php echo form_input('name', set_value('name')); ?></dd>
        </dl>

        <dl>
            <dt><label>Deskripsi</label><dt>
            <dd><?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'), 'cols' => 40)); ?></dd>
        </dl>
        <dl class="submit">
            <?php echo form_submit('Submit', 'Simpan') ?>
        </dl>
        <?php echo form_close(); ?>
    </fieldset>
</div>