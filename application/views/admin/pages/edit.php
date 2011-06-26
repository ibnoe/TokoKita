<?php echo initialize_tinymce(); ?>
<h2>Tambah Halaman</h2>
<?php if (validation_errors ()): ?>
    <div class="error_box">
    <?php echo validation_errors(); ?>
</div>
<?php endif ?>
    <div class="form">
        <fieldset>
        <?php echo form_open('admin/pages/edit', array('class' => 'niceform')) ?>
        <dl>
            <dt><label>Nama</label></dt>
            <dd><?php echo form_input(array('name' => 'title', 'value' => set_value('title', isset($page['title']) ? $page['title'] : ''), 'size' => 40)); ?></dd>
        </dl>

        <dl>
            <dt><label>Deskripsi</label><dt>
            <dd><?php echo form_textarea(array('name' => 'content', 'value' => set_value('body', isset($page['body']) ? $page['body'] : '') ? $page['body'] : '', 'cols' => 50)); ?></dd>
        </dl>
        <dl>
            <dt><label>Status</label></dt>
            <dd><?php echo form_dropdown('status', $status, $page['status']); ?><dd/>
        </dl>
        <dl class="submit">
            <?php echo form_submit('Submit', 'Simpan') ?>
        </dl>
        <?php echo form_close(); ?>
    </fieldset>
</div>