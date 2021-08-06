<?php
/**
 * Template for displaying quote content
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if ( current_user_can( 'edit_pages' ) ) : ?>
    <header class="entry-header">
      <?php edit_post_link(); ?>
    </header>
  <?php endif; ?>

  <section class="entry-content">
    <?php the_content(); ?>
  </section><!-- .entry-content -->

</article>
