<h2>Edit Kategori</h2>
<?php if (validation_errors ()): ?>
    <div class="error_box">
    <?php echo validation_errors(); ?>
</div>
<?php endif ?>
    <div class="form">
        <fieldset>
        <?php echo form_open('admin/categories/edit', array('class' => 'niceform')) ?>
        <?php echo form_hidden('id', $category['id']); ?>
        <dl>
            <dt><label>Nama</label></dt>
            <dd><?php echo form_input('name', set_value('name', isset($category['name']) ? $category['name'] : '')); ?></dd>
        </dl>

        <dl>
            <dt><label>Deskripsi</label><dt>
            <dd> <?php echo form_textarea(array('name'=>'description','cols' => 40,'value' => set_value('description', isset($category['description']) ? $category['description'] : '') ? $category['description'] : '')); ?> </dl>
        <dl class="submit">
            <?php echo form_submit('Submit', 'Simpan') ?>
        </dl>
        <?php echo form_close(); ?>
    </fieldset>
</div>

