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

$contact = get_option('activate_contact_form');
if (@$contact == 1) {
    add_action('init', 'nazar_contact_custom_post_type');
}

// Contact custom post type
function nazar_contact_custom_post_type()
{
    $labels = array(
      'name'            => 'Messages',
      'singular_name'   => 'Message',
      'menu_name'       => 'Messages',
      'name_admin_bar'  => 'Message'
    );

    $args = array(
      'labels'           => $labels,
      'show_ui'         => true,
      'show_in_menu'    => true,
      'capability_type' => 'post',
      'hierarchical'    => false,
      'menu_position'   => 24,
      'menu_icon'       => 'dashicons-email-alt',
      'supports'        => array('title', 'editor', 'author')
    );

    register_post_type('nazar-contact', $args);
}
