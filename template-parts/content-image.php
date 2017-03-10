<?php

/*
  =============================================
            Image Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    $featured_image = '';
    if(has_post_thumbnail())
      $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    else {
      $attachments = get_posts( array(
          'post_type'     =>   'attachment',
          'posts_per_page'   =>    1,
          'post_parent'   =>    get_the_ID()
      ));
      if ($attachments) {
        foreach ($attachments as $attachment) {
          $featured_image = wp_get_attachment_url($attachment->ID);
        }
      }
    }
  ?>
  <header class="entry-header text-center featured-image image-format" style="background-image: url(<?php echo $featured_image; ?>);">
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
