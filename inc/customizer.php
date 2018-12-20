<?php
/**
  * Theme Customizer settings
  *
  * @since 1.1.0
  * @version 1.3.0 [Removed breadcrumbs and center widgets setting]
  * @version 1.3.0 [Added border color setting]
  */
function siggen_curtomize_register( $wp_customize ){
  // Toggle site title
  $wp_customize->add_setting( 'display_site_title', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'display_site_title', array(
    'label'     => __( 'Display Site Title', 'siggen' ),
    'section'   => 'title_tagline',
    'type'      => 'checkbox',
  ) );
  
  // Toggle site description
  $wp_customize->add_setting( 'display_tagline', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'display_tagline', array(
    'label'     => __( 'Display Tagline', 'siggen' ),
    'section'   => 'title_tagline',
    'type'      => 'checkbox',
  ) );

  // Text color
  $wp_customize->add_setting( 'text_color', array(
    'default'           => '#fff7ed',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
    'label'      => __( 'Text Color', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'text_color',
  ) ) );

  // Anchor text color
  $wp_customize->add_setting( 'link_color', array(
    'default'           => '#fff7ed',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'      => __( 'Link Color', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'link_color',
  ) ) );

  // Border color
  $wp_customize->add_setting( 'border_color', array(
    'default'           => '#4B4339',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color', array(
    'label'      => __( 'Border Color', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'border_color',
  ) ) );

  // Site info color
  $wp_customize->add_setting( 'site_info_color', array(
    'default' => '#fff7ed',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_info_color', array(
    'label'      => __( 'Site information color', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'site_info_color',
  ) ) );

  // Menu background
  $wp_customize->add_setting( 'menu_background_color', array(
    'default'           => '#191919',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
    'label'      => __( 'Menu background', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'menu_background_color',
  ) ) );

  // Menu text
  $wp_customize->add_setting( 'menu_text_color', array(
    'default'           => '#fff7ed',
    'sanitize_callback' => 'sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
    'label'      => __( 'Menu text color', 'siggen' ),
    'section'    => 'colors',
    'settings'   => 'menu_text_color',
  ) ) );

  // Image filter
  $wp_customize->add_setting( 'image_filter', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'image_filter', array(
    'label'     => __( 'Sepia filter on images', 'siggen' ),
    'section'   => 'colors',
    'type'      => 'checkbox',
  ) );

  // Entry meta section
  $wp_customize->add_section( 'entry_meta' , array(
    'title'      => __( 'Entry Metadata', 'siggen' ),
    'priority'   => 80,
  ) );

  // Entry meta author
  $wp_customize->add_setting( 'entry_meta_author', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'entry_meta_author', array(
    'label'     => __('Display author', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox',
  ) );

  // Entry meta date
  $wp_customize->add_setting( 'entry_meta_date', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'entry_meta_date', array(
    'label'     => __('Display date posted', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox',
  ) );

  // Entry meta comments
  $wp_customize->add_setting( 'entry_meta_comments', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'entry_meta_comments', array(
    'label'     => __('Display comment count', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox',
  ) );

  // Entry meta post format
  $wp_customize->add_setting( 'entry_meta_post_format', array( 
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox' 
  ) );

  $wp_customize->add_control( 'entry_meta_post_format', array(
    'label'     => __('Display Post Format', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox'
  ) );

  // Entry meta categories
  $wp_customize->add_setting( 'entry_meta_categories', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'entry_meta_categories', array(
    'label'     => __('Display Categories', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox',
  ) );

  // Entry meta tags
  $wp_customize->add_setting( 'entry_meta_tags', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'entry_meta_tags', array(
    'label'     => __('Display Tags', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox',
  ) );

  // Author bio
  $wp_customize->add_setting( 'author_bio', array( 
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'author_bio', array(
    'label'     => __('Display Author Bio', 'siggen'),
    'section'   => 'entry_meta',
    'type'      => 'checkbox'
  ) );

  // Theme options
  $wp_customize->add_section( 'design_options' , array(
    'title'      => __( 'Theme options', 'siggen' ),
    'priority'   => 90,
  ) );

  // Display full content or summery/excerpt
  $wp_customize->add_setting( 'display_content', array(
    'default'           => false,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'display_content', array(
    'label'     => __('Display full content of posts on index pages', 'siggen'),
    'section'   => 'design_options',
    'type'      => 'checkbox',
  ) );

  // Display thumbnails on index pages
  $wp_customize->add_setting( 'thumbnail_index', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'thumbnail_index', array(
    'label'     => __('Display thumbnails on index pages', 'siggen'),
    'section'   => 'design_options',
    'type'      => 'checkbox',
  ) );

  // Display thumbnails on content pages
  $wp_customize->add_setting( 'thumbnail_content', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'thumbnail_content', array(
    'label'     => __('Display thumbnails on content pages', 'siggen'),
    'section'   => 'design_options',
    'type'      => 'checkbox',
  ) );

  // Display read more button
  $wp_customize->add_setting( 'read_more', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'read_more', array(
    'label'     => __('Display read more button', 'siggen'),
    'section'   => 'design_options',
    'type'      => 'checkbox',
  ) );

  // Social icons
  $wp_customize->add_section( 'social_icons' , array(
    'title'      => __( 'Social Media Icons', 'siggen' ),
    'priority'   => 50,
  ) );

  // RSS link
  $wp_customize->add_setting( 'social_media_rss', array(
    'default'           => false,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'social_media_rss', array(
    'label'     => __('RSS Link', 'siggen'),
    'section'   => 'social_icons',
    'type'      => 'checkbox',
  ) );

  // Social icons
  global $siggen_social_icons;

  foreach( $siggen_social_icons as $service => $icon){
    $wp_customize->add_setting( 'social_media_'.strtolower($service), array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'social_media_'.strtolower($service), array(
      'label'     => $service.' URL',
      'section'   => 'social_icons',
      'type'      => 'text',
    ) );
  }

  // Footer section
  $wp_customize->add_section( 'footer' , array(
    'title'      => __( 'Footer', 'siggen' ),
    'priority'   => 120,
  ) );

  // Change copyright text
  $wp_customize->add_setting( 'footer_text', array(
    'default'           => get_bloginfo('name'),
    'sanitize_callback' => 'sanitize_text_field'
  ) );

  $wp_customize->add_control( 'footer_text', array(
    'label'     => __('Footer text', 'siggen'),
    'section'   => 'footer',
    'type'      => 'text',
  ) );

  // Toggle copyright icon
  $wp_customize->add_setting( 'footer_copyright', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'footer_copyright', array(
    'label'     => __('Show Copyright Icon', 'siggen'),
    'section'   => 'footer',
    'type'      => 'checkbox',
  ) );

  // Toggle current year
  $wp_customize->add_setting( 'footer_year', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'footer_year', array(
    'label'     => __('Show Current Year', 'siggen'),
    'section'   => 'footer',
    'type'      => 'checkbox',
  ) );

  // Advertise theme author
    $wp_customize->add_setting( 'footer_advert', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'footer_advert', array(
    'label'     => __('Advertise Theme', 'siggen'),
    'section'   => 'footer',
    'type'      => 'checkbox',
  ) );

  // Scroll to top icon
  $wp_customize->add_setting( 'scrolltotop', array(
    'default'           => true,
    'sanitize_callback' => 'siggen_sanitize_checkbox'
  ) );

  $wp_customize->add_control( 'scrolltotop', array(
    'label'     => __('Scroll to top icon in footer', 'siggen'),
    'section'   => 'footer',
    'type'      => 'checkbox',
  ) );
}
add_action('customize_register', 'siggen_curtomize_register');

/**
 * Sanitize checkboxes
 * 
 * @param  Boolean $input
 * @return Boolean
 */
function siggen_sanitize_checkbox( $input ) {
  // Boolean check 
  return ( ( isset( $input ) && true == $input ) ? true : false );
}