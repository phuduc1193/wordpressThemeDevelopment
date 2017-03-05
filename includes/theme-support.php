<?php

/*
  =============================================
              Theme Support Otions
  =============================================
*/

$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if (!empty($options)) {
    add_theme_support('post-formats', $output);
}

$header = get_option('custom_header');
if (@$header == 1) {
    add_theme_support('custom-header');
}

$background = get_option('custom_background');
if (@$background == 1) {
    add_theme_support('custom-background');
}

/* Functions are declared at includes/custom-post-type.php */
$contact = get_option('activate_contact_form');
if (@$contact == 1) {
    add_action('init', 'nazar_contact_custom_post_type');
    add_filter('manage_nazar-contact_posts_columns', 'nazar_set_contact_columns');
    add_action('manage_nazar-contact_posts_custom_column', 'nazar_contact_custom_column', 10, 2);
    add_action('add_meta_boxes', 'nazar_add_contact_meta_box');
    add_action('save_post', 'nazar_save_contact_email_data');
}

/* Nav Menu Options */
function nazar_register_nav_menu()
{
    register_nav_menu('main', 'Main Navigation Menu');
}
add_action('after_setup_theme', 'nazar_register_nav_menu');

/* Blog Post Format */
function nazar_posted_meta()
{
  $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
  $categories = get_the_category();
  $separator = ', ';
  $output_categories = '';
	$i = 1;
  if (!empty($categories)) {
    foreach ($categories as $category) {
			if($i>1) { $output_categories .= $separator; }
      $output_categories .= '<a href="'. esc_url(get_category_link($category->term_id)) .'" alt="'. esc_attr('View all posts in %s', $category->name) .'">'. esc_html($category->name) .'</a>';
			$i++;
    }
  } /* endif */
  return '<span class="posted-on">'. $posted_on .'</span> | <span class="posted-in">'. $output_categories .'</span>';
}
function nazar_posted_footer()
{
	$comments_num = get_comments_number();
	if (comments_open()){
		if ($comments_num == 0) {
			 $comments = __('No comments');
		} elseif ($comments_num > 1) {
			$comments = $comments_num . __(' Comments');
		} else { $comments = __('1 Comment'); }
		$comments = '<a href="'. get_comments_link() .'">'. $comments .' <i class="fa fa-comment"></i></a>';
	} else {
		$comments = __('Comments are closed');
	}
  return '<div class="post-footer-container"><div class="row"><div class="col-sm-6">'. get_the_tag_list('<div class="tag-list"><i class="fa fa-tag"></i>', ' ', '</div>') .'</div><div class="col-sm-6">'. $comments .'</div></div></div>';
}
