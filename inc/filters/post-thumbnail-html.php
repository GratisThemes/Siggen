<?php
/**
 * Post thumbnail HTML
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

/**
 * Add a wrapper element arounf the post thumbnail
 *
 * @param string $html              The post thumbnail HTML element.
 * @param int    $post_id           The post ID.
 * @param int    $post_thumbnail_id The post thumbnail ID.
 * @param string $size              The post thumbnail size.
 * @param string $attr              The post thumbnail atributes.
 **/
function siggen_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
  $is_singular = is_singular();

  if (
    '' === $html ||
    ( $is_singular && ! get_theme_mod( 'thumbnail_content', true ) ) ||
    ( ! $is_singular && ! get_theme_mod( 'thumbnail_index', true ) )
  ) {
    return;
  }

  if ( $is_singular ) {
    return '<div class="post-thumbnail">' . $html . '</div><!-- .post-thumbnail -->';
  } else {
    $post_permalink = get_the_permalink( $post_id );
    $post_title     = get_the_title( $post_id );

    return '<a class="post-thumbnail" href="' . $post_permalink . '" aria-label="' . $post_title . '">' . $html . '</a><!-- .post-thumbnail -->';
  }
}
add_filter( 'post_thumbnail_html', 'siggen_post_thumbnail_html', 99, 5 );
