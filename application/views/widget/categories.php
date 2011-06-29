<div class="title"><span class="title_icon"><img src="<?php echo base_url() ?>public/front/images/bullet5.gif" alt="" title="" /></span>Kategori</div> 

<?php $categories = $this->front_library->getCategories() ?>

<ul class="list">
    <?php if ($categories): ?>
        <?php foreach ($categories as $category): ?>
            <li><?php echo anchor('products/category/' . $category['permalink'], $category['name']); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>

</ul>
