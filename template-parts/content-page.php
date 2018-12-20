<?php
/**
 * Template for displaying content on pages
 *
 * @package Siggen
 * @since 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <?php the_title( '<h1>', '</h1>' ); ?>

    <div class="entry-meta">
      <?php
      edit_post_link(
        sprintf(
          '%1$s<span class="screen-reader-text">%1$s "%2$s"</span>',
          __( 'Edit', 'siggen' ),
          get_the_title()
        )
      );
      ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

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
    the_content();

    wp_link_pages( array(
      'before'      => '<div class="page-links">' . __( 'Pages:', 'siggen' ),
      'after'       => '</div>',
      'link_before' => '<span class="page-number">',
      'link_after'  => '</span>',
    ) );
    ?>
  </article><!-- .entry-content -->
</section>