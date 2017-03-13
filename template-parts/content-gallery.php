<?php

/*
  =============================================
            Gallery Post Format
  =============================================
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nazar-format-gallery'); ?>>
  <header class="entry-header text-center">
    <?php the_title('<h1 class="entry-title"><a href="'. esc_url(get_the_permalink()) .'" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
      <?php echo nazar_posted_meta(); ?>
    </div>
  </header>
  <div class="entry-content">
    <?php
      if(nazar_get_attachment()):
        $attachments = nazar_get_attachment(7);
    ?>
    <div id="post-gallery-<?php the_ID(); ?>">
				<?php
					foreach( $attachments as $attachment ):
				?>
					<div class="featured-image standard-featured hvr-float-shadow" style="background-image: url( <?php echo wp_get_attachment_url( $attachment->ID ); ?> );"></div>
				<?php endforeach; ?>
			</div>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="btn-wrapper text-center"><a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more'); ?></a></div>
  </div><!-- /.entry-content -->
  <footer class="entry-footer">
    <?php echo nazar_posted_footer(); ?>
  </footer>
</article>
