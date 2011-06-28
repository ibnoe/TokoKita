
<h1>Header</h1>
<hr/>
<?php echo anchor('','Home')?> |
<?php if ($this->users_library->isLogin() == TRUE): ?>
<?php echo anchor('users/logout', 'Logout'); ?>
<?php endif; ?>
<hr/>
<?php if (!empty($content)): ?>
<?php $this->load->view($content); ?>
<?php else: ?>
        Halaman tidak ada
<?php endif; ?>
<hr/>
<h2>Footer</h2>