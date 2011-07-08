<div class="title"><span class="title_icon"><img src="<?php echo base_url(); ?>public/front/images/bullet1.gif" alt="" title="" /></span>Register</div>

<div class="feat_prod_box_details">
    <?php echo form_open('users/register') ?>
    <div class="contact_form">
        <div class="form_subtitle">Semua form harus diisi !</div>  
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif ?>
        <div class="form_row">
            <label class="contact"><strong>Nama Lengkap:</strong></label>
            <input type="text" class="contact_input" name="full_name" value="<?php echo set_value('full_name'); ?>"/>
        </div>  

        <div class="form_row">
            <label class="contact"><strong>Email:</strong></label>
            <input type="text" class="contact_input" name="email" value="<?php echo set_value('email'); ?>" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Password:</strong></label>
            <input type="password" class="contact_input" name="password" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Ulangi Passoword:</strong></label>
            <input type="password" class="contact_input" name="confirm_password" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Telepon:</strong></label>
            <input type="text" class="contact_input" name="phone" value="<?php echo set_value('phone'); ?>" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Kode Pos:</strong></label>
            <input type="text" class="contact_input" name="zip" value="<?php echo set_value('zip'); ?>" />
        </div>
        <div class="form_row">
            <label class="contact"><strong>Alamat Lengkap:</strong></label>
            <textarea class="contact_textarea" name="address"><?php echo set_value('address'); ?></textarea>
        </div>
        <div class="form_row">
            <label class="contact">&nbsp;</label>
            <input type="Submit" class="register" value="Pesan"/>
        </div>      
    </div>
    <?php echo form_close(); ?>
</div>