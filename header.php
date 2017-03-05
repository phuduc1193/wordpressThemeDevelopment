<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="container-fluid">
      <div class="row">
        <div class="header-container" style="background-image: url(<?php header_image(); ?>);">
          <div class="header-content text-center table">
            <div class="table-cell">
              <h1 class="title"><?php bloginfo('name'); ?></h1>
              <h2 class="description"><?php bloginfo('description'); ?></h2>
            </div><!-- /.table-cell -->
          </div><!-- /.header-content -->
          <div class="nav-container container">
            <nav class="navbar navbar-default navbar-nazar">
              <?php
              wp_nav_menu(array(
                'theme_location'  =>   'main',
                'container'       =>    false,
                'menu_class'      =>   'nav navbar-nav'
              ));
              ?>
            </nav>

          </div><!-- /.nav-container -->
        </div><!-- /.header-container -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
