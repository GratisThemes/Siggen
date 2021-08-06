<?php
/**
 * Filters for body_class().
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

/**
 * Add classes to the body depending on customize settings.
 *
 * @param  array $classes Body class names.
 *
 * @return array $classes Body class names.
 */
function siggen_body_class( $classes ) {

  if ( ( is_home() || is_archive() || is_search() || is_singular() ) && is_active_sidebar( 'sidebar-widget-area' ) ) {
    $classes[] = 'has-sidebar';
  }

  return $classes;

}
add_filter( 'body_class', 'siggen_body_class' );
