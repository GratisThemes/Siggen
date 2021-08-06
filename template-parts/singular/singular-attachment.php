<?php
/**
 * Template for displaying attachments
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <?php siggen_entry_meta(); ?>
    <?php edit_post_link(); ?>
  </header>

  <section class="entry-content">
    <figure class="entry-attachment wp-block-image">
      <?php
      $siggen_image_size = apply_filters( 'wporg_attachment_size', 'full' );
      echo wp_get_attachment_image( get_the_ID(), $siggen_image_size );
      ?>

      <figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>
    </figure><!-- .entry-attachment -->

    <?php
    wp_link_pages(
      array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'siggen' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      )
    );
    ?>
  </section>
</article>

<nav class="image-nav">
  <div class="image-nav__previous">
    <?php previous_image_link( false, '<i class="fa fa-long-arrow-alt-left"></i>' . __( 'Previous Image', 'siggen' ) ); ?>
  </div>
  <div class="image-nav__next">
    <?php next_image_link( false, __( 'Next Image', 'siggen' ) . '<i class="fa fa-long-arrow-alt-right"></i>' ); ?>
  </div>
</nav><!-- .image-nav -->
