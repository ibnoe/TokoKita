
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        <title>Book Store</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/front/css/style.css" />
        <script src="<?php echo base_url() ?>public/front/javascripts/prototype.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>public/front/javascripts/scriptaculous.js?load=effects" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>public/front/javascripts/lightbox.js" type="text/javascript"></script>
        <script  src="<?php echo base_url() ?>public/front/javascripts/java.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrap">

            <?php $this->load->view('header'); ?>


            <div class="center_content">
                <div class="left_content">
                    <?php if (!empty($content)): ?>
                        <?php $this->load->view($content); ?>
                    <?php else: ?>
                        Halaman tidak ada
                    <?php endif; ?>
                    <div class="clear"></div>
                </div><!--end of left content-->

                <?php $this->load->view('sidebar') ?>
                <div class="clear"></div>
            </div><!--end of center content-->


            <?php $this->load->view('footer') ?>


        </div>

    </body>
</html>