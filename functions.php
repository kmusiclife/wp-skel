<?php

set_post_thumbnail_size(900, 9999, true);
add_theme_support('post-thumbnails');
add_image_size( 'rect', 500, 500, true);
add_image_size( 'normal', 1000, 667, true);

// Excerptの設定 250文字までの抜粋で残りは...として表示
function custom_excerpt_length( $length ) { return 250;  }
add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
function custom_excerpt_more( $more ) { return '...'; }
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// トピックスのカスタムポストを登録する
// ROUTER: /topics
// SINGLE TEMPLATE: single-topics.php or single.php
// ARCHIVE TEMPLATE: archive-topics.php or archive.php
/*
register_post_type('topics', array(
    'label' => 'トピックス',
    'public' => true,
    'publicly_queryable' => true,
    'menu_position' => 5,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'topics'),
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes', 'excerpt')
));
*/

// トピックスのtaxonomyを登録する
// ROUTER: /subject/xxx (xxxはtaxonomy追加時のslug) 
// TEMPLATE: taxonomy-subject.php or taxonomy.php
/*
register_taxonomy(
  'subject', // このタグのスラッグ categoryの名前は使えない(予約)
  'topics', // register_post_typeのslugを指定
  array(
    'label' => 'トピックスのカテゴリ',
    'public' => true,
    'description' => '',
    'hierarchical' => true,
    'show_in_rest' => true 
  )
);
*/
// トピックスのslugはすべてpost_IDに置き換える
/*
function custom_post_force_slug( $slug, $post_ID, $post_status, $post_type ) {
    if($post_type == 'topics') return $post_ID;
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'custom_post_force_slug', 10, 4 );
*/

