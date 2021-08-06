<?php
/**
 * Template for displaying image content
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
    <?php siggen_entry_meta(); ?>
    <?php edit_post_link(); ?>
  </header>

  <section class="entry-content">
    <?php the_content(); ?>
  </section><!-- .entry-content -->

</article>
