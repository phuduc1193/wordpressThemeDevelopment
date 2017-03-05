<?php

/*
  =============================================
            Standard Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <div class="entry-meta">
      <?php echo nazar_posted_meta(); ?>
    </div>
  </header>
  <div class="entry-content">
    <?php if(has_post_thumbnail()): ?>
      <div class="featured-image"><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="btn-wrapper"><a href="<?php the_permalink(); ?>" class="more"><?php _e('Read more'); ?></a></div>
  </div><!-- /.entry-content -->
  <footer class="entry-footer">
    <?php echo nazar_posted_footer(); ?>
  </footer>
</article>
