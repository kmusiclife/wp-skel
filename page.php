<?php get_header() ?>

<div class="container">
  <div class="row">
    <div class="col-12">
        <?php if( have_posts() ): while( have_posts() ): the_post(); include('variables.php'); ?>
            <!--  Title -->
            <h1><?php the_title() ?></h1>
            <!--  Date -->
            <div><?php echo get_the_date('Y年m月d日 H時i分s秒') ?></div>
            <!-- Categories -->
            <?php if($categories): ?>
            <ul>
                <?php foreach($categories as $category): ?>
                    <li><a href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <!-- Tags -->
            <?php if($tags): ?>
            <ul>
                <?php foreach($tags as $tag): ?>
                    <li><a href="<?php echo get_tag_link($tag) ?>"><?php echo $tag->name ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <!-- Thumbnail -->
            <?php if($thumbnail_image): ?><div><img src="<?php echo $thumbnail_image ?>" /></div><?php endif; ?>
            <!--  Content -->
            <div><?php the_content() ?></div>
        <?php endwhile; endif; ?>
    </div>
  </div>
</div>

<?php get_footer() ?>
