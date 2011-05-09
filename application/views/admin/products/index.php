<h2>List Produk</h2>
<?php if ($this->session->flashdata('message')):?>
    <?php echo $this->session->flashdata('message');?>
<?php endif;?>
        
        <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($products):?>
            <?php $no = 1;?>
            <?php foreach ($products as $product):?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['sku']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['categoryName']?></td>
                <td><?php echo $product['stock']?></td>
                <td><?php echo $status[$product['status']]?></td>
                <td><? echo anchor('admin/products/edit/'.$product['id'],'Edit');?> | <?php echo anchor('admin/products/delete/'.$product['id'],'Hapus',array ('onClick' => "return confirm('Yakin akan menghapus data ini?')"))?></td>
            </tr>
            <?php $no++;?>
            <?php endforeach;?>
            <?php else:?>
            <tr>
                <td colspan="3">Tidak ada data</td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>

<br/>
<?php echo anchor('admin/products/add','Tambah Produk');?>
