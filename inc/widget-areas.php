<?php
/**
 * Widget areas
 *
 * @package Siggen
 * @since  1.0.0
 */

function siggen_widgets_init() {
  
  register_sidebar( array(
    'name'          => __('Top Widget Area', 'siggen'),
    'id'            => 'top-widget-area',
    'description'   => __('Widget area above the content', 'siggen'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Sidebar Widget Area', 'siggen'),
    'id'            => 'sidebar-widget-area',
    'description'   => __('Widget area at the side of the content', 'siggen'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer Widget Area', 'siggen'),
    'id'            => 'footer-widget-area',
    'description'   => __('Widget area in the footer', 'siggen'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'siggen_widgets_init' );