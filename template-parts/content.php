<?php

/*
  =============================================
            Standard Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header text-center">
    <?php the_title('<h1 class="entry-title"><a href="'. esc_url(get_the_permalink()) .'" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo nazar_posted_meta(); ?>
    </div>
  </header>
  <div class="entry-content">
    <?php
      if(has_post_thumbnail()):
        $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    ?>
      <a class="featured-image-link" href="<?php the_permalink(); ?>">
        <div class="featured-image" style="background-image: url(<?php echo $featured_image; ?>);"></div>
      </a>
    <?php endif; ?>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="btn-wrapper text-center"><a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more'); ?></a></div>
  </div><!-- /.entry-content -->
  <footer class="entry-footer">
    <?php echo nazar_posted_footer(); ?>
  </footer>
</article>
