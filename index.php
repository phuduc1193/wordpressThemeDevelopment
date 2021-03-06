<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="main-section" role="main">
    <div class="container nazar-posts-container">
      <?php
        if (have_posts()):
          while (have_posts()): the_post();
            get_template_part('template-parts/content', get_post_format());
          endwhile;
        endif;
      ?>
    </div><!-- /.container -->
  </main>
</div><!-- /#primary -->

<div class="load-more text-center" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><i class="fa fa-refresh fa-spin fa-fw"></i> Loading More Posts ...</div>

<?php get_footer(); ?>
