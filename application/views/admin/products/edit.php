<h2>Tambah Produk</h2>
<?php if (validation_errors ()): ?>
    <div class="error_box">
    <?php echo validation_errors(); ?>
</div>
<?php endif; ?>

    <div class="form">
        <fieldset>
        <?php echo form_open('admin/products/edit', array('class' => 'niceform')) ?>
        <?php echo form_hidden('id', $product['id']); ?>
        <dl>
            <dt><label>SKU</label></dt>
            <dd><?php echo form_input('sku', set_value('sku', isset($product['sku']) ? $product['sku'] : '')) ?></dd>
        </dl>
        <dl>
            <dt><label>Nama</label></dt>
            <dd><?php echo form_input('name', set_value('name', isset($product['name']) ? $product['name'] : '')); ?></dd>
        </dl>
        <dl>
            <dt><label>Harga</label></dt>
            <dd><?php echo form_input('price', set_value('price', isset($product['price']) ? $product['price'] : '')); ?></dd>
        </dl>
        <dl>
            <dt><label>Stok</label></dt>
            <dd><?php echo form_input('stock', set_value('stock', isset($product['stock']) ? $product['stock'] : '')); ?></dd>
        </dl>

        <dl>
            <dt><label>Deskripsi</label><dt>
            <dd> <?php echo form_textarea(array('name'=>'description','value'=> set_value('description', isset($product['description']) ? $product['description'] : ''),'cols' => 40)); ?></dd>
        </dl>
        <dl>
            <dt><label>Kategori</label></dt>
            <dd><?php echo form_dropdown('category_id', $categories, $product['category_id']); ?></dd>
        </dl>
        <dl>
            <dt><label>Status</label></dt>
            <dd><?php echo form_dropdown('status', $status, $product['status']); ?><dd/>
        </dl>
        <dl class="submit">
            <?php echo form_submit('Submit', 'Simpan') ?>
        </dl>
        <?php echo form_close(); ?>
    </fieldset>
</div>