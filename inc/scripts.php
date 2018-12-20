<?php
/**
 * Scripts, styles and fonts
 *
 * @package Siggen
 * @since 1.0.0
 */
function siggen_scripts() {
  
  // Fonts from google
  wp_enqueue_style( 'siggen-fonts', 'https://fonts.googleapis.com/css?family=Alex+Brush|Lora:400,700,400italic,700italic', array(), null);

  // Enqueue Font Awesome (example icon set)
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/icons/font-awesome/css/font-awesome.min.css', array(), '4.6.3');

  // Theme stylesheet
  wp_enqueue_style( 'siggen-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );

  // Theme JavaScript
  wp_enqueue_script( 'siggen-script', get_template_directory_uri() . '/assets/js/functions.js', false, wp_get_theme()->get('Version'), true );

  // Comment-reply script
  if ( !is_admin() && is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Custom styles
  $options = [
    '#' . get_background_color(),
    get_theme_mod( 'text_color',            '#FFF7ED' ),
    get_theme_mod( 'link_color',            '#FFF7ED' ),
    get_theme_mod( 'site_info_color',       '#FFF7ED' ),
    get_theme_mod( 'menu_background_color', '#191919' ),
    get_theme_mod( 'menu_text_color',       '#FFF7ED' ),
    get_theme_mod( 'border_color',          '#4B4339' ),
    get_header_image()
  ];

  $css = '
    :root {
      --color-bg: %1$s; 
      --color-text: %2$s;
      --color-anchor: %3$s;
      --color-branding: %4$s;
      --color-bg-menu: %5$s;
      --color-text-menu: %6$s;
      --color-border: %7$s;
    }
  ';

  if( has_header_image() ){
    $css .= '
      #site-header {
        background-image: url( %8$s );
      }
    ';
  }

  if( !get_theme_mod( 'image_filter', true ) ){
    $css .= '
      img {
        -webkit-filter: none;
        filter: none;
      }
    ';
  }
  
  wp_add_inline_style( 'siggen-style', vsprintf( $css, $options ) );

}
add_action( 'wp_enqueue_scripts', 'siggen_scripts' );