<?php
if (!is_blog_installed()) { return; }
 
if ('http://' . $_SERVER['SERVER_NAME'] == get_option('home')) {
  update_option('siteurl', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
  update_option('home', 'http://' . $_SERVER['SERVER_NAME']);
  update_option('upload_path', $_SERVER['DOCUMENT_ROOT'] . '/media');
  update_option('upload_url_path', 'http://' . $_SERVER['SERVER_NAME'] . '/media');
  update_option('permalink_structure', '/%postname%/');
}

if (defined('FRONT_PAGE') && defined('POSTS_PAGE') && !get_option('page_on_front')) {
  $front = get_page_by_title(FRONT_PAGE);
  $posts = get_page_by_title(POSTS_PAGE);
 
  if ($front && $posts) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front->ID);
    update_option('page_for_posts', $posts->ID);
  }
}
?>