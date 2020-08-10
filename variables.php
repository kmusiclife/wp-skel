<?php 

    $categories = get_the_category(get_the_ID());
    $categories = $categories ? $categories : array();
    $category = (is_array($categories) and isset($categories[0])) ? $categories[0] : null;

    $tags = get_the_tags(get_the_ID());
    $tags = $tags ? $tags : array();

    //  SEO ALL IN ONEの説明をdescriptionとして利用する
    $description = get_post_meta(get_the_ID(), '_aioseop_description', true);
    $description = $description ? $description : get_the_excerpt();

    $post_date_modify = get_the_modified_time('Y年m月d日', get_the_id());
    $post_date_created = get_the_date('c');
    $post_date_published = get_the_date('c');
    $post_date_modified = get_the_modified_time('c');
    $post_date_diff = human_time_diff( get_the_time('U'), current_time('timestamp') );
    $post_revision = count( wp_get_post_revisions( get_the_id() ) );

    // アイキャッチ 
    $thumbnail_image = $thumbnail_medium_image = null;
    if ( has_post_thumbnail() ) {
        $thumbnail_image_id = get_post_thumbnail_id();
        list($thumbnail_image,) = wp_get_attachment_image_src( $thumbnail_image_id , 'normal');
        list($thumbnail_medium_image,) = wp_get_attachment_image_src( $thumbnail_image_id , 'medium');
    }
    // アイキャッチが含まれない場合はnullではなく特定の画像を入力する場合
    /*
    if(!$thumbnail_image) $thumbnail_image = get_template_directory_uri().'/images/thumbnail.jpg';
    if(!$thumbnail_medium_image) $thumbnail_image = get_template_directory_uri().'/images/thumbnail.jpg';
    */

    // カスタムポストで画像以外の場合
    /*
    $post_custom_data = get_post_meta(get_the_id(), 'custom_data', true);
    */

    // カスタムポストで画像を登録する場合
    /*
    $post_custom_image_id = get_post_meta(get_the_id(), 'carousel_image', true);
    $post_custom_image = $post_custom_medium_image = null;
    if ( $post_custom_image_id ) {
        list($post_custom_image,) = wp_get_attachment_image_src( $post_custom_image_id , 'medium_large');
        list($post_custom_medium_image,) = wp_get_attachment_image_src( $post_custom_image_id , 'medium');
    }
    */
    
?>