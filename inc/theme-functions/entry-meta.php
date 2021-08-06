<?php
/**
 * Entry meta
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

/**
 * Entry meta
 */
function siggen_entry_meta() {

  $parent_id   = wp_get_post_parent_id( get_the_ID() );
  $post_type   = get_post_type();
  $post_format = get_post_format();

  echo '<div class="entry-meta">';

  if ( ! is_single() && ( 'aside' === $post_format || 'status' === $post_format ) ) {
    $author = get_the_author();
    $date   = get_the_date();

    printf(
      /* translators: %1$s: Author, %2$s: Publish date */
      '<span class="entry-meta__author-and-date">' . esc_html__( '%1$s @ %2$s', 'siggen' ) . '</span>',
      sprintf(
        '<a href="%1$s" aria-label="%2$s">%3$s</a>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        /* translators: %s post author */
        sprintf( esc_attr__( 'Author: %s', 'siggen' ), $author ), // phpcs:ignore WordPress.Security.EscapeOutput
        $author // phpcs:ignore WordPress.Security.EscapeOutput
      ),
      sprintf(
        '<a href="%1$s" aria-label="%2$s">%3$s</a>',
        esc_url( get_permalink() ),
        /* translators: %s post date */
        sprintf( esc_attr__( 'Posted: %s', 'siggen' ), $date ), // phpcs:ignore WordPress.Security.EscapeOutput
        $date // phpcs:ignore WordPress.Security.EscapeOutput
      )
    );

  } else {

    if ( get_theme_mod( 'entry_meta_author', true ) && ! is_attachment() ) {
      $author = get_the_author();

      printf(
        '<span class="entry-meta__author"><i class="far fa-user"></i><a href="%1$s" aria-label="%3$s">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        $author, // phpcs:ignore WordPress.Security.EscapeOutput
        sprintf(
          /* translators: %s post author */
          esc_attr__( 'Author: %s', 'siggen' ),
          $author // phpcs:ignore WordPress.Security.EscapeOutput
        )
      );
    }

    if ( get_theme_mod( 'entry_meta_date', true ) ) {
      $date = get_the_date();

      printf(
        '<span class="entry-meta__date"><i class="far fa-calendar"></i><a href="%1$s" aria-label="%3$s">%2$s</a></span>',
        esc_url( get_permalink() ),
        $date, // phpcs:ignore WordPress.Security.EscapeOutput
        sprintf(
          /* translators: %s post date */
          esc_attr__( 'Posted: %s', 'siggen' ),
          $date // phpcs:ignore WordPress.Security.EscapeOutput
        )
      );
    }

    $comment_count = get_comments_number();
    if ( $comment_count && comments_open() && get_theme_mod( 'entry_meta_comments', true ) ) {
      printf(
        '<span class="entry-meta__comments"><i class="far fa-comment"></i><a href="%2$s#comments" aria-label="%3$s">%1$s</a></span>',
        esc_html( $comment_count ),
        esc_url( get_permalink() ),
        sprintf(
          /* translators: %s comment count */
          esc_attr( _n( '%s comment', '%s comments', $comment_count, 'siggen' ) ),
          esc_attr( number_format_i18n( $comment_count ) )
        )
      );
    }

    if ( wp_attachment_is_image() ) {
      $metadata = wp_get_attachment_metadata();

      printf(
        '<span class="entry-meta__image-size"><i class="far fa-image"></i><a href="%1$s"><span class="screen-reader-text">%2$s</span>%3$sx%4$s</a></span>',
        esc_url( wp_get_attachment_url() ),
        esc_html__( 'Attachment resolution', 'siggen' ),
        absint( $metadata['width'] ),
        absint( $metadata['height'] )
      );
    }

    if ( has_category() && get_theme_mod( 'entry_meta_categories', true ) ) {
      // TODO: find a way to add aria-label or screen-reader-text for this.
      printf(
        '<span class="entry-meta__categories"><i class="far fa-folder"></i>%s</span>',
        get_the_category_list( ', ' ) // phpcs:ignore WordPress.Security.EscapeOutput
      );
    }
  }

  echo '</div><!-- .entry-meta -->';
}
