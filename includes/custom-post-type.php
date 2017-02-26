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
        $email = get_post_meta($post_id, '_nazar_contact_email_value_key', true);
        echo '<a href="mailto:'.$email.'">'.$email.'</a>';
        break;
    }
}

function nazar_add_contact_meta_box()
{
    add_meta_box('contact_email', 'User email', 'nazar_conact_email_callback', 'nazar-contact', 'normal', 'high');
}

function nazar_conact_email_callback($post)
{
    wp_nonce_field('nazar_save_contact_email_data', 'nazar_contact_email_meta_box_nonce');

    $value = get_post_meta($post->ID, '_nazar_contact_email_value_key', true);

    echo '<label for="nazar_contact_email_field">User Email Address:</label>';
    echo ' <input type="email" id="nazar_contact_email_field" name="nazar_contact_email_field" value="'.esc_attr($value).'" size="25" />';
}

function nazar_save_contact_email_data($post_id)
{
    if (!isset($_POST['nazar_contact_email_meta_box_nonce'])) {
        return;
    }
    // check valid
    if (!wp_verify_nonce($_POST['nazar_contact_email_meta_box_nonce'], 'nazar_save_contact_email_data')) {
        return;
    }
    // prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // check authorization
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['nazar_contact_email_field'])) {
        return;
    }

    $email = sanitize_text_field($_POST['nazar_contact_email_field']);
    update_post_meta($post_id, '_nazar_contact_email_value_key', $email);
}
