<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>AdministratorDashboard | Team GIS</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/style.css" />
        <script type="text/javascript" src="<?php echo base_url() ?>public/javascripts/clockp.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/javascripts/clockh.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/javascripts/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/javascripts/ddaccordion.js"></script>
        <script type="text/javascript">
            ddaccordion.init({
                headerclass: "submenuheader", //Shared CSS class name of headers group
                contentclass: "submenu", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: false, //Should contents open by default be animated into view?
                persiststate: true, //persist state of opened contents within browser session?
                toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            })
        </script>

        <script type="text/javascript" src="<?php echo base_url() ?>public/javascripts/jconfirmaction.jquery.js"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                $('.ask').jConfirmAction();
            });

        </script>

        <script language="javascript" type="text/javascript" src="<?php echo base_url() ?>public/javascripts/niceforms.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>public/css/niceforms-default.css" />

    </head>
    <body>
        <div id="main_container">

            <div class="header">
                <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>

                <div class="right_header">Welcome <?php echo $this->session->userdata('nama_lengkap')?>, <a href="<?php echo base_url()?>" target="_blank">Visit site</a> | <a href="<?php echo base_url()?>index.php/users/logout" class="logout">Logout</a></div>
                <div id="clock_a"></div>
            </div>

            <div class="main_content">

                <?php $this->load->view('admin/top_menu') ?>




                <div class="center_content">



                    <div class="left_content">

<!--                        <div class="sidebar_search">
                            <form>
                                <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
                                <input type="image" class="search_submit" src="images/search.png" />
                            </form>
                        </div>-->

                        <div class="sidebarmenu">

                            <a class="menuitem submenuheader" href="">Produk</a>
                            <div class="submenu">
                                <ul>
                                    <li><?php echo anchor('admin/products/add','Tambah')?></li>
                                    <li><?php echo anchor('admin/products','Daftar')?></li>

                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="" >Kategori</a>
                            <div class="submenu">
                                <ul>
                                    <li><?php echo anchor('admin/categories/add','Tambah');?></li>
                                    <li><?php echo anchor('admin/categories','Daftar');?></li>

                                </ul>
                            </div>
                            <a class="menuitem submenuheader" href="">Halaman</a>
                            <div class="submenu">
                                <ul>
                                    <li><?php echo anchor('admin/pages/add','Tambah')?></li>
                                    <li><?php echo anchor('admin/pages','Daftar');?></li>

                                </ul>
                            </div>

                        </div>


                    </div>

                    <div class="right_content">


                        <?php if (!empty($content)): ?>
                        <?php $this->load->view($content); ?>
                        <?php else: ?>
                                Halaman tidak ada
                        <?php endif; ?>

                    </div><!-- end of right content-->


                </div>   <!--end of center content -->




                <div class="clear"></div>
            </div> <!--end of main content-->


            <div class="footer">

                <div class="left_footer">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
                <div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>

            </div>

        </div>
    </body>
</html>