<?php
/**
 * Template for displaying video content
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
    <?php
    $siggen_video_content = apply_filters( 'the_content', get_the_content() );
    $siggen_video         = null;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $siggen_video_content, 'wp-playlist-script' ) ) {
      $siggen_video = get_media_embedded_in_content( $siggen_video_content, array( 'video', 'object', 'embed', 'iframe' ) );
    }

    if ( ! empty( $siggen_video ) ) {
      foreach ( $siggen_video as $siggen_video_html ) {
        echo $siggen_video_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }
    ?>
  </section><!-- .entry-content -->

</article>
