<?php

/*
  =============================================
            Image Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nazar-format-image'); ?>>
  <header class="entry-header text-center featured-image image-format-content" style="background-image: url(<?php echo nazar_get_attachment(); ?>);">
    <div class="overlay"></div>
    <?php the_title('<h1 class="entry-title"><a href="'. esc_url(get_the_permalink()) .'" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo nazar_posted_meta(); ?>
    </div>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
  </header>
  <footer class="entry-footer">
    <?php echo nazar_posted_footer(); ?>
  </footer>
</article>
