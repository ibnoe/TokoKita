<h2>List Kategori</h2>
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
                <th scope="col" class="rounded-q4" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($categories): ?>
        <?php $no = 1; ?>
        <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td><a href="<?php echo base_url() ?>index.php/admin/categories/edit/<?php echo $category['id']; ?>"><img src="<?php echo base_url(); ?>public/images/images/user_edit.png" alt="" title="" border="0" /></a></td>
                    <td><a href="<?php echo base_url() ?>index.php/admin/categories/delete/<?php echo $category['id']; ?>"  class="ask"><img src="<?php echo base_url(); ?>public/images/images/trash.png" alt="" title="" border="0" /></a></td>

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
<a href="<?php echo base_url(); ?>index.php/admin/categories/add" class="bt_green"><span class="bt_green_lft"></span><strong>Tambah Kategori</strong><span class="bt_green_r"></span></a>

