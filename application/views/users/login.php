<div class="title"><span class="title_icon"><img src="<?php echo base_url(); ?>public/front/images/bullet1.gif" alt="" title="" /></span>Login</div>

<div class="feat_prod_box_details">
    <?php echo form_open('users/login'); ?>
    <div class="contact_form">
        <div class="form_subtitle">Form Login</div>
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif ?>
        <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="email" value="<?php echo set_value('email') ?>" />
        </div>  

        <div class="form_row">
            <label class="contact"><strong>Password:</strong></label>
            <input type="password" class="contact_input" name="password" />
        </div>
        <div class="form_row">
            <label class="contact">&nbsp;</label>
            <?php echo anchor('users/register', 'Register') ?> | 
            <?php echo anchor('users/forgot_password', ' Lupa Password ?'); ?>
            <input type="Submit" class="register" value="Login"/>
        </div>      
    </div>
    <?php echo form_close(); ?>
</div>