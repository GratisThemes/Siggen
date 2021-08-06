<?php
/**
 * Template for displaying audio content
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

  <?php the_post_thumbnail(); ?>

  <section class="entry-content">
    <?php
    $siggen_audio_content = apply_filters( 'the_content', get_the_content() );
    $siggen_audio         = null;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $siggen_audio_content, 'wp-playlist-script' ) ) {
      $siggen_audio = get_media_embedded_in_content( $siggen_audio_content, array( 'audio' ) );
    }

    if ( ! empty( $siggen_audio ) ) {
      foreach ( $siggen_audio as $siggen_audio_html ) {
        echo $siggen_audio_html;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    } else {
      the_content();
    }
    ?>
  </section><!-- .entry-content -->

</article>
