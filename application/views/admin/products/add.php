<?php echo initialize_tinymce() ?>
<h2>Tambah Produk</h2>
<?php if (validation_errors ()): ?>
    <div class="error_box">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
    <div class="form">
        <fieldset>
        <?php echo form_open('admin/products/add', array('class' => 'niceform')) ?>
        <dl>
            <dt><label>SKU</label></dt>
            <dd><?php echo form_input(array('name' => 'sku', 'value' => set_value('sku'), 'size' => 20)); ?></dd>
        </dl>
        <dl>
            <dt><label>Nama</label></dt>
            <dd><?php echo form_input(array('name' => 'name', 'value' => set_value('name'), 'size' => 40)); ?></dd>
        </dl>
        <dl>
            <dt><label>Harga</label></dt>
            <dd><?php echo form_input(array('name' => 'price', 'value' => set_value('price'), 'size' => 20)); ?></dd>
        </dl>
        <dl>
            <dt><label>Stok</label></dt>
            <dd><?php echo form_input(array('name' => 'stock', 'value' => set_value('stock'), 'size' => 20)); ?></dd>
        </dl>

        <dl>
            <dt><label>Deskripsi</label><dt>
            <dd> <?php echo form_textarea(array('name' => 'description', 'value' => set_value('description'), 'cols' => 50)); ?></dd>
        </dl>
        <dl>
            <dt><label>Kategori</label></dt>
            <dd><?php echo form_dropdown('category_id', $categories); ?></dd>
        </dl>
        <dl>
            <dt><label>Status</label></dt>
            <dd><?php echo form_dropdown('status', $status); ?><dd/>
        </dl>
        <dl class="submit">
            <?php echo form_submit('Submit', 'Simpan') ?>
        </dl>
        <?php echo form_close(); ?>
    </fieldset>
</div>