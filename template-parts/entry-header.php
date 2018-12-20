<?php
/**
 * Template for displaying entry headers
 *
 * @package Siggen
 * @since 1.0.0
 */
?>
<header class="entry-header">
  <?php
  if ( is_single() ) {
    printf(
      '<h1>%s</h1>',
      get_the_title() === '' ? __( 'Untitled post', 'siggen' ) : get_the_title()
    );
  } else {
    printf(
      '<h3><a href="%2$s">%1$s</a></h3>',
      get_the_title() === '' ? __( 'Untitled post', 'siggen' ) : get_the_title(), 
      esc_url( get_permalink() )
    );
  }
  ?>

  <div class="entry-meta">
    <?php
    if ( get_theme_mod( 'entry_meta_author', true ) && !is_attachment() ) {
      printf(
        '<span class="entry-meta-author"><a href="%1$s">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
    }
    ?>

    <?php
    if ( get_theme_mod( 'entry_meta_date', true ) ) {
      printf(
        '<span class="entry-meta-date"><a href="%1$s">%2$s</a></span>',
        esc_url( get_permalink() ),
        get_the_date()
      );
    }
    ?>

    <?php
    if ( wp_attachment_is_image() ) {
      $metadata = wp_get_attachment_metadata();

      printf( '<span class="entry-meta-image-dimesions">%1$sx%2$s</span>',
        absint( $metadata['width'] ),
        absint( $metadata['height'] )
      );
    }
    ?>

    <?php
    $siggen_comment_count = get_comments_number();
    if ( $siggen_comment_count && comments_open() && get_theme_mod( 'entry_meta_comments', true ) ) {
      printf(
        '<span class="entry-meta-comments"><a href="%1$s#comments">%2$s</a></span>',
        esc_url( get_permalink() ),
        $siggen_comment_count
      );
    }
    ?>

    <?php
    if ( has_post_format() && get_theme_mod( 'entry_meta_post_format', true ) ) {
      $siggen_post_format = get_post_format();
      printf(
        '<span class="entry-meta-post-format"><a href="%1$s">%2$s</a></span>',
        esc_url( get_post_format_link(  $siggen_post_format ) ),
        get_post_format_string( $siggen_post_format )
      );
    }
    ?>

    <?php
    if ( has_category() && get_theme_mod( 'entry_meta_categories', true) ) : ?>
      <span class="entry-meta-categories">
        <?php the_category(', '); ?>
        <span class="screen-reader-text"><?php _e( 'categories', 'siggen'); ?></span>
      </span>
    <?php endif; ?>

    <?php
    edit_post_link(
      sprintf(
        '<span class="entry-meta-edit">%1$s<span class="screen-reader-text">%1$s "%2$s"</span></span>',
        __( 'Edit', 'siggen' ),
        get_the_title()
      )
    );
    ?>
  </div><!-- .entry-meta -->
</header><!-- .entry-header -->