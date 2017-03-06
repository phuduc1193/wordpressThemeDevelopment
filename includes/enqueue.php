<?php

/*
  =============================================
                ENQUEUE SCRIPTS
  =============================================
*/

function nazar_load_main_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('nazar-general', get_template_directory_uri().'/css/nazar.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Permanent+Marker');
    wp_enqueue_script('nazar-js', get_template_directory_uri().'/js/nazar.js', array('jquery'), '0.1', true);
}
add_action('wp_enqueue_scripts', 'nazar_load_main_scripts');

function nazar_load_admin_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('nazar-admin-css', get_template_directory_uri().'/css/nazar.admin.css', array(), '0.1', 'all');
    wp_enqueue_script('nazar-admin-js', get_template_directory_uri().'/js/nazar.admin.js', array('jquery'), '0.1', true);
    wp_enqueue_script('vuejs', 'https://unpkg.com/vue@2.2.1/dist/vue.min.js');
    wp_enqueue_script('vueapp', get_template_directory_uri().'/js/vue.app.js', array('vuejs'), '0.1', true);
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'nazar_load_admin_scripts');
