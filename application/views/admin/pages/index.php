<h2>List Halaman</h2>
<?php if ($this->session->flashdata('message')): ?>
<?php echo $this->session->flashdata('message'); ?>
<?php endif; ?>

    <table id="rounded-corner">
        <thead>
            <tr>

                <th scope="col" class="rounded-company">No</th>
                <th scope="col" class="rounded">Judul</th>
                <th scope="col" class="rounded">Status</th>
                <th scope="col" class="rounded-q4" colspan="2">Aksi</th>
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
                    <td><a href="<?php echo base_url() ?>index.php/admin/pages/edit/<?php echo $page['id']; ?>"><img src="<?php echo base_url(); ?>public/images/images/user_edit.png" alt="" title="" border="0" /></a></td>
                    <td><a href="<?php echo base_url() ?>index.php/admin/pages/delete/<?php echo $page['id']; ?>"  class="ask"><img src="<?php echo base_url(); ?>public/images/images/trash.png" alt="" title="" border="0" /></a></td>

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

            <a href="<?php echo base_url(); ?>index.php/admin/pages/add" class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Halaman</strong><span class="bt_green_r"></span></a>

