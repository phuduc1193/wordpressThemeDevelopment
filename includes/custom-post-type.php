<?php

/*
  =============================================
              Custom Post Type
  =============================================
*/


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

function nazar_set_contact_columns($columns)
{
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function nazar_contact_custom_column($column, $post_id)
{
    switch ($column) {
      case 'message':
        echo get_the_excerpt();
        break;
      case 'email':
        echo 'email';
        break;
    }
}
