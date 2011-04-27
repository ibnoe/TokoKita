
<h2>Login</h2>
<br/>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')): ?>
<?php echo $this->session->flashdata('message'); ?>
<?php endif ?>
    <br/>
<?php echo form_open('users/login'); ?>
    Email : <?php echo form_input('email', set_value('email')); ?><br/>
    Password : <?php echo form_input('password') ?><br/>
<?php echo form_submit('Submit', 'Login') ?>

<?php echo form_close(); ?>