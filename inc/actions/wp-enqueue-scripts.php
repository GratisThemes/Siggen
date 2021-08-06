<?php
/**
 * The wp_enqueue_scripts hook.
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

/**
 * Enqueue scripts, styles and fonts
 */
function siggen_wp_enqueue_scripts() {

  $theme_version = wp_get_theme()->get( 'Version' );

  // Fonts from google.
  wp_enqueue_style(
    'siggen-fonts',
    'https://fonts.googleapis.com/css?family=Alex+Brush|Lora:400,700,400italic,700italic',
    false,
    $theme_version
  );

  // Enqueue Font Awesome (icon set).
  wp_enqueue_style(
    'font-awesome',
    get_template_directory_uri() . '/assets/icons/fontawesome-free-5.15.3-web/css/all.min.css',
    false,
    '5.15.3'
  );

  // Theme stylesheet.
  wp_enqueue_style(
    'siggen-style',
    get_stylesheet_uri(),
    false,
    $theme_version
  );

  // Replace the stylesheet with a RTL one if needed.
  wp_style_add_data( 'siggen-style', 'rtl', 'replace' );

  // Theme JavaScript.
  wp_enqueue_script(
    'siggen-script',
    get_template_directory_uri() . '/assets/js/functions.js',
    false,
    $theme_version,
    true
  );

  // Comment-reply script.
  if ( ! is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Custom styles.
  $options = array(
    '#' . get_background_color(),
    get_theme_mod( 'text_color', '#FFF7ED' ),
    get_theme_mod( 'link_color', '#FFF7ED' ),
    get_theme_mod( 'site_info_color', '#FFF7ED' ),
    get_theme_mod( 'menu_background_color', '#191919' ),
    get_theme_mod( 'menu_text_color', '#FFF7ED' ),
    get_theme_mod( 'border_color', '#4B4339' ),
    get_header_image(),
  );

  $css = '
    :root {
      --background-color:      %1$s;
      --text-color:            %2$s;
      --anchor-color:          %3$s;
      --site-branding-color:   %4$s;
      --menu-background-color: %5$s;
      --menu-text-color:       %6$s;
      --border-color:          %7$s;
    }
  ';

  if ( has_header_image() ) {
    $css .= '
      .hero::before {
        background-image: url( %8$s );
      }
    ';
  }

  if ( ! get_theme_mod( 'image_filter', true ) ) {
    $css .= '
      img {
        -webkit-filter: none;
        filter: none;
      }
    ';
  }

  wp_add_inline_style( 'siggen-style', vsprintf( $css, $options ) );

}
add_action( 'wp_enqueue_scripts', 'siggen_wp_enqueue_scripts' );
