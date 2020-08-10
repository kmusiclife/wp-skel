<?php get_header() ?>

<div class="container">
  <div class="row">
<?php
    $pager = null;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_status' => array('publish'),
        'post_type' => 'post', 
        'numberposts' => -1,
        'paged' => $paged,
        'posts_per_page' => get_option('posts_per_page'),
    );
    $the_query = new WP_Query($args);
    if( $the_query->have_posts() ): while( $the_query->have_posts() ): $the_query->the_post(); 
        include('variables.php');
        include('include-post.php');
    endwhile; endif;

    $pager = paginate_links( array(
        // 'base' => '/xxxx/%_%', // この投稿のpost_type, ページを指定する
        'base' => '/%_%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $the_query->max_num_pages,
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
