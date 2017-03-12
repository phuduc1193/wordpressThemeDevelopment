<?php

/*
  =============================================
            Standard Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nazar-format-video'); ?>>
  <header class="entry-header text-center">
    <div class="embed-responsive embed-responsive-16by9">
      <?php echo nazar_get_embeded_media(array('audio', 'iframe')); ?>
    </div>
    <?php the_title('<h1 class="entry-title"><a href="'. esc_url(get_the_permalink()) .'" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo nazar_posted_meta(); ?>
    </div>
  </header>
  <div class="entry-content">
    <?php
      if(nazar_get_attachment()):
    ?>
      <a class="featured-image-link" href="<?php the_permalink(); ?>">
        <div class="featured-image" style="background-image: url(<?php echo nazar_get_attachment(); ?>);"></div>
      </a>
    <?php endif; ?>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="btn-wrapper text-center"><a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more'); ?></a></div>
  </div><!-- /.entry-content -->
  <footer class="entry-footer">
    <?php echo nazar_posted_footer(); ?>
  </footer>
</article>
