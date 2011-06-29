<?php $page = $this->front_library->getPagesByPermalink('tentang-kami');?>
<div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span><?php echo $page['title']?></div> 
<div class="about">
    <p>
        <img src="<?php echo base_url() ?>public/front/images/about.gif" alt="" title="" class="right" />
        <?php echo $page['body']?>
    </p>

</div>