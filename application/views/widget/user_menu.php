<div class="user_menu">
    <div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet4.gif" alt="" title="" /></span>Menu User</div>
    <ul class="list">
        <?php if ($this->session->userdata('id')): ?>
            <li><a href="<?php echo base_url() ?>index.php/users/profile">Ubah Profil</a></li>
            <li><a href="<?php echo base_url() ?>index.php/users/logout">Keluar</a></li>
        <?php else: ?>
            <li><a href="<?php echo base_url() ?>index.php/users/login">Login</a></li>
            <li><a href="<?php echo base_url() ?>index.php/users/register">Register</a></li>

        <?php endif; ?>

    </ul>
</div>