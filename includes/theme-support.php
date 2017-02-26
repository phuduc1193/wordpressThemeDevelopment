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

// Functions are declared at includes/custom-post-type.php
$contact = get_option('activate_contact_form');
if (@$contact == 1) {
    add_action('init', 'nazar_contact_custom_post_type');
    add_filter('manage_nazar-contact_posts_columns', 'nazar_set_contact_columns');
    add_action('manage_nazar-contact_posts_custom_column', 'nazar_contact_custom_column', 10, 2);
    add_action('add_meta_boxes', 'nazar_add_contact_meta_box');
    add_action('save_post', 'nazar_save_contact_email_data');
}
