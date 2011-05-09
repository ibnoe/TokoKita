<h2>List Halaman</h2>
<?php if ($this->session->flashdata('message')): ?>
<?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                 <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($pages): ?>
        <?php $no = 1; ?>
        <?php foreach ($pages as $page): ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $page['title'] ?></td>
                    <td><?php echo $status[$page['status']] ?></td>
                    <td><? echo anchor('admin/pages/edit/' . $page['id'], 'Edit'); ?> | <?php echo anchor('admin/pages/delete/' . $page['id'], 'Hapus', array('onClick' => "return confirm('Yakin akan menghapus data ini?')")) ?></td>
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
<?php echo anchor('admin/pages/add', 'Tambah Halaman'); ?>
