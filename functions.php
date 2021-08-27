<?php

set_post_thumbnail_size(900, 9999, true);
add_theme_support('post-thumbnails');
add_image_size( 'square', 500, 500, true);
add_image_size( 'normal', 1000, 667, true);

// Excerptの設定 250文字までの抜粋で残りは...として表示
function custom_excerpt_length( $length ) { return 250;  }
add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );
function custom_excerpt_more( $more ) { return '...'; }
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// アップロードする拡張子の制限
add_filter('upload_mimes',function($mimes) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'pdf' => 'application/pdf'
    );
    return $mimes;
});
// アップロードファイルをuniqid().(jpg|png|pdf)に置き換え
add_filter('sanitize_file_name', function($filename) {
  $info = pathinfo($filename);
  if( isset($info['extension']) ){
    $ext = strtolower($info['extension']);
    if( preg_match('/jpg|pdf/', $ext) ) {
      return uniqid() . '.' . $ext;
    }
  }
  return $filename;
}, 10);

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

/* -----------------------------------------------------------
 外観のカスタマイズ
----------------------------------------------------------- */
// 外観のカスタマイズに「テーマ基本設定」を追加
/* テーマ内では echo custom_theme_setting('setting_value_one') として利用 */
/*
add_action('customize_register', function($wp_custom_theme) {

  $wp_custom_theme->add_section( 'custom_theme_section', array (
    'title' => 'テーマ基本設定',
    'priority' => 100,
  ));
  custom_theme_control($wp_custom_theme, array(
    'id' => 'setting_value_one', 
    'priority' => 10,
    'type' => 'textarea',
    'label' => '設定項目のラベル',
    'description' => '設定項目の説明文章。',
    'default' => '',
  ));
});
function custom_theme_control(&$wp_custom_theme, $params=array()){

  if(!isset($params['id'])) return null;
  if(!isset($params['default'])) $params['default'] = '';
  if(!isset($params['label'])) $params['label'] = '';
  if(!isset($params['description'])) $params['description'] = '';
  if(!isset($params['type'])) $params['type'] = 'textarea';
  if(!isset($params['priority'])) $params['priority'] = 20;

  $wp_custom_theme->add_setting( 'custom_theme_setting_'.$params['id'], array (
    'default' => $params['default'],
  ));
  $wp_custom_theme->add_control( 'custom_theme_setting_'.$params['id'], array(
    'section' => 'custom_theme_section',
    'settings' => 'custom_theme_setting_'.$params['id'],
    'label' => $params['label'],
    'description' => $params['description'],
    'type' => $params['type'],
    'priority' => $params['priority'],
  ));
  return $wp_custom_theme;

}
function custom_theme_setting($id) {
  return get_theme_mod( 'custom_theme_setting_'.$id, true );
}
*/

