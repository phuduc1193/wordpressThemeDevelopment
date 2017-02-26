<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
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
        <div class="header-container text-center" style="background: url(<?php header_image(); ?>) no-repeat center center fixed;">
          <div class="header-content table">
            <div class="table-cell">
              <h1 class="title"><?php bloginfo('name'); ?></h1>
              <h2 class="description"><?php bloginfo('description'); ?></h2>
            </div><!-- /.table-cell -->
          </div><!-- /.header-content -->
          <div class="nav-container">

          </div><!-- /.nav-container -->
        </div><!-- /.header-container -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
