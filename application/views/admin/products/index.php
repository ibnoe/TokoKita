<h2>List Produk</h2>

<?php if ($this->session->flashdata('message')): ?>
    <div class="valid_box">
    <?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif; ?>


    <table id="rounded-corner">
        <thead>
            <tr>

                <th scope="col" class="rounded-company">No</th>
                <th scope="col" class="rounded">Nama</th>
                <th scope="col" class="rounded">SKU</th>
                <th scope="col" class="rounded">Harga</th>
                <th scope="col" class="rounded">Kategori</th>
                <th scope="col" class="rounded">Stok</th>
                <th scope="col" class="rounded">Status</th>
                <th scope="col" class="rounded-q4" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if ($products): ?>
        <?php $no = 1; ?>
        <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['sku'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['categoryName'] ?></td>
                    <td><?php echo $product['stock'] ?></td>
                    <td><?php echo $status[$product['status']] ?></td>
                    <td><a href="<?php echo base_url() ?>index.php/admin/products/edit/<?php echo $product['id']; ?>"><img src="<?php echo base_url(); ?>public/images/images/user_edit.png" alt="" title="" border="0" /></a></td>
                    <td><a href="<?php echo base_url() ?>index.php/admin/products/delete/<?php echo $product['id']; ?>"  class="ask"><img src="<?php echo base_url(); ?>public/images/images/trash.png" alt="" title="" border="0" /></a></td>
        
                </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
        <?php else: ?>
                    <tr>
                        <td colspan="3">Tidak ada data</td>
                    </tr>
        <?php endif; ?>
                </tbody>
            </table>
<a href="<?php echo base_url(); ?>index.php/admin/products/add" class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Produk</strong><span class="bt_green_r"></span></a>

