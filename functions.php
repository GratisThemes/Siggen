<?php
/**
 * Theme functions and definitions
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

if ( ! function_exists( 'siggen_setup' ) ) {
  /**
   * Set up theme defaults and registers support for various WordPress features
   */
  function siggen_setup() {

    /**
     * Support for translation files
     * https://codex.wordpress.org/Function_Reference/load_theme_textdomain
     */
    load_theme_textdomain( 'siggen', get_template_directory() . '/languages' );

    /**
     * Main content width
     * https://codex.wordpress.org/Content_Width
     */
    if ( ! isset( $content_width ) ) {
      $content_width = 960;
    }

    /**
     * Register support for various WordPress features
     */

    /* https://codex.wordpress.org/Automatic_Feed_Links */
    add_theme_support( 'automatic-feed-links' );

    /* https://codex.wordpress.org/Title_Tag */
    add_theme_support( 'title-tag' );

    /* https://codex.wordpress.org/Theme_Logo */
    add_theme_support( 'custom-logo' );

    /* https://codex.wordpress.org/Post_Thumbnails */
    add_theme_support( 'post-thumbnails' );

    /* https://codex.wordpress.org/Custom_Backgrounds */
    add_theme_support(
      'custom-background',
      array(
        'default-color'      => '0a0909',
        'default-repeat'     => 'repeat',
        'default-attachment' => 'scroll',
      )
    );

    /* https://codex.wordpress.org/Theme_Markup */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    /* https://codex.wordpress.org/Post_Formats */
    add_theme_support(
      'post-formats',
      array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
      )
    );

    /* https://codex.wordpress.org/Custom_Headers */
    add_theme_support(
      'custom-header',
      array(
        'default-image'  => '%s/assets/images/piano.jpg',
        'random-default' => false,
        'width'          => 1440,
        'height'         => 500,
        'flex-height'    => true,
        'flex-width'     => true,
        'header-text'    => false,
        'uploads'        => true,
      )
    );

    /* https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content */
    add_theme_support( 'responsive-embeds' );

    /* https://codex.wordpress.org/Function_Reference/register_default_headers */
    register_default_headers(
      array(
        'piano' => array(
          'url'           => '%s/assets/images/piano.jpg',
          'thumbnail_url' => '%s/assets/images/piano_thumbnail.jpg',
          'description'   => __( 'piano', 'siggen' ),
        ),
      )
    );

    /* Navigation */
    register_nav_menus(
      array(
        'header' => __( 'Header', 'siggen' ),
        'footer' => __( 'Footer', 'siggen' ),
      )
    );

  }
  add_action( 'after_setup_theme', 'siggen_setup' );

}

// Actions.
require_once get_template_directory() . '/inc/actions.php';

// Filters.
require_once get_template_directory() . '/inc/filters.php';

// Theme specific functions.
require_once get_template_directory() . '/inc/theme-functions.php';
