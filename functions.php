<?php
/**
 * Theme functions and definitions
 *
 * @package Siggen
 */

if ( !function_exists( 'siggen_setup' ) ) {
  /**
   * Set up theme defaults and registers support for various WordPress features
   *
   * @since  1.0.0
   */
  function siggen_setup() {
    // Support for translation files
    // https://codex.wordpress.org/Function_Reference/load_theme_textdomain
    load_theme_textdomain( 'siggen', get_template_directory() . '/languages' );

    // Main content width
    // https://codex.wordpress.org/Content_Width
    if ( ! isset( $content_width ) ) $content_width = 1056;

    /* 
     * Register support for various WordPress features
     */
    
    // https://codex.wordpress.org/Automatic_Feed_Links
    add_theme_support( 'automatic-feed-links' );
    
    // https://codex.wordpress.org/Title_Tag
    add_theme_support( 'title-tag' );
    
    // https://codex.wordpress.org/Theme_Logo
    add_theme_support( 'custom-logo' );

    // https://codex.wordpress.org/Post_Thumbnails
    add_theme_support( 'post-thumbnails' );

    // https://codex.wordpress.org/Custom_Backgrounds
    add_theme_support( 'custom-background', array(
      'default-color'      => '191919',
      'default-repeat'     => 'repeat',
      'default-attachment' => 'scroll',
    ) );

    // https://codex.wordpress.org/Theme_Markup
    add_theme_support( 'html5', array(
      'search-form', 
      'comment-form',
      'comment-list',
      'gallery', 
      'caption'
    ) );

    // https://codex.wordpress.org/Post_Formats
    add_theme_support( 'post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat',
    ) );

    // https://codex.wordpress.org/Custom_Headers
    add_theme_support( 'custom-header', array(
      'default-image'  => '%s/assets/images/header.jpg',
      'random-default' => false,
      'width'          => 1056,
      'height'         => 500,
      'flex-height'    => false,
      'flex-width'     => false,
      'header-text'    => false,
      'uploads'        => true,
    ) );

    // Editor styles for TinyMCE and Gutenberg
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );

    // https://codex.wordpress.org/Function_Reference/register_default_headers
    register_default_headers( array(
      'vaping360' => array(
        'url'           => '%s/assets/images/header.jpg',
        'thumbnail_url' => '%s/assets/images/header_thumbnail.jpg',
        'description'   => _x( 'vaping360', 'Vaping individual', 'siggen' )
      )
    ) );

    // Navigation
    register_nav_menus( array(
      'header' => __( 'Header', 'siggen' ),
      'footer' => __( 'Footer', 'siggen' ),
    ) );

  }
  add_action( 'after_setup_theme', 'siggen_setup' );

}

// Scripts and styles
require_once get_template_directory() . '/inc/scripts.php';

// Widgets areas
require_once get_template_directory() . '/inc/widget-areas.php';

// Filters
require_once get_template_directory() . '/inc/filters.php';

// WP Customizer settings
require_once get_template_directory() . '/inc/customizer.php';

// Theme specific functions
require_once get_template_directory() . '/inc/theme-functions.php';