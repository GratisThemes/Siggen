<?php
/**
 * Template for displaying video content
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
    <?php
    if ( preg_match_all( '|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i', get_the_content(), $matches ) ) {
      printf(
        '<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
        esc_url( $matches[1][0] ),
        esc_html( get_the_title() ),
      );
    } else {
      the_content();
    }
    ?>
  </section><!-- .entry-content -->

</article>
