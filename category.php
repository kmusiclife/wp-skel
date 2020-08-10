<?php get_header() ?>

<div class="container">
  <div class="row">
<?php
    if( have_posts() ): while( have_posts() ): the_post(); 
        include('variables.php');
        include('include-post.php');
    endwhile; endif;
    $pager = paginate_links( array(
        'prev_text' => '前のページ',
        'next_text' => '次のページ'
    ) );
    wp_reset_query();
    wp_reset_postdata();
    include('include-pager.php');
?>
  </div>
</div>

<?php get_footer() ?>
