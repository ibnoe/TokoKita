<h2>List Kategori</h2>
<?php if ($this->session->flashdata('message')): ?>
<?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($categories): ?>
        <?php $no = 1; ?>
        <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td><? echo anchor('admin/categories/edit/' . $category['id'], 'Edit'); ?> | <?php echo anchor('admin/categories/delete/' . $category['id'], 'Hapus', array('onClick' => "return confirm('Yakin akan menghapus data ini?')")) ?></td>
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

            <br/>
<?php echo anchor('admin/categories/add', 'Tambah Kategori'); ?>
<a href="#" onclick="confirm('test')">test</a>