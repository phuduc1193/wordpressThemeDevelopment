<?php

/*
  =============================================
                REMOVE WP VERSION
  =============================================
*/

function nazar_remove_wp_version($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'nazar_remove_wp_version');
add_filter('style_loader_src', 'nazar_remove_wp_version');

function nazar_remove_wp_meta_version()
{
    return '';
}
add_filter('the_generator', 'nazar_remove_wp_meta_version');
