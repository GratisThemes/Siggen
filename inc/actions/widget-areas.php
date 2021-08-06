<?php
/**
 * Widget areas
 *
 * @package Siggen
 * @since  1.0.0
 */

/**
 * The widgets_init action
 */
function siggen_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Top Widget Area (column one)', 'siggen' ),
      'id'            => 'top-widget-area',
      'description'   => __( 'Widget area above the content, left column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Top Widget Area (column two)', 'siggen' ),
      'id'            => 'top-widget-area-two',
      'description'   => __( 'Widget area above the content, center column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Top Widget Area (column three)', 'siggen' ),
      'id'            => 'top-widget-area-three',
      'description'   => __( 'Widget area above the content, right column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Sidebar Widget Area', 'siggen' ),
      'id'            => 'sidebar-widget-area',
      'description'   => __( 'Widget area aside the content', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Footer Widget Area (column one)', 'siggen' ),
      'id'            => 'footer-widget-area',
      'description'   => __( 'Widget area in the footer, left column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Footer Widget Area (column two)', 'siggen' ),
      'id'            => 'footer-widget-area-two',
      'description'   => __( 'Widget area in the footer, center column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  register_sidebar(
    array(
      'name'          => __( 'Footer Widget Area (column three)', 'siggen' ),
      'id'            => 'footer-widget-area-three',
      'description'   => __( 'Widget area in the footer, right column', 'siggen' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

}
add_action( 'widgets_init', 'siggen_widgets_init' );
