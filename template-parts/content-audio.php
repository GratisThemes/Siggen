<?php
/**
 * Template for displaying audio content
 *
 * @package Siggen
 * @since 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php get_template_part( 'template-parts/entry', 'header' ); ?>

  <?php if ( 
    get_the_post_thumbnail() !== '' &&
    (
      (  is_singular() && get_theme_mod( 'thumbnail_content', true ) ) ||
      ( !is_singular() && get_theme_mod( 'thumbnail_index',   true ) )
    )
  ): ?>
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      <?php the_post_thumbnail( 'siggen-featured-image' ); ?>
    </a><!-- .post-thumbnail -->
  <?php endif; ?>

  <article class="entry-content">
    <?php 
    $siggen_audio_content = apply_filters( 'the_content', get_the_content() );
    $siggen_audio = false;

    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $siggen_audio_content, 'wp-playlist-script' ) ) {
      $siggen_audio = get_media_embedded_in_content( $siggen_audio_content, array( 'audio' ) );
    }

    if ( !is_single() && !empty( $siggen_audio ) ) {
      
      foreach ( $siggen_audio as $siggen_audio_html ) {
        echo $siggen_audio_html;
      }

    } else {
      
      the_content();

      wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'siggen' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
    }
    ?>
  </article><!-- .entry-content -->

  <?php
  if ( is_single() ) {
    get_template_part('template-parts/entry', 'footer');
  } ?>
</section>