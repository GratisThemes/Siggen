<?php
/**
	* Siggen Functions
	*
  * @package Siggen
	* @since Siggen 1.0
	*/

if ( ! function_exists( 'siggen_setup' ) ) :
	/**
	* Initial theme setup
	*
	* @since Siggen 1.0
	*/
	function siggen_setup() {
		
		// Support for translation files
		load_theme_textdomain( 'siggen', get_template_directory() . '/languages' );

		// Content width
		if ( ! isset( $content_width ) ) $content_width = 1056;

		// Adds editor styles
		add_editor_style( str_replace( ',', '%2C', 'https://fonts.googleapis.com/css?family=Alex+Brush|Lora:400,700,400italic,700italic' ) );
		add_editor_style();

		/**
			* Enable support for Post Formats
			* @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Formats
			*/
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Enables support for custom logo
		add_theme_support( 'custom-logo' );

		// Enable support for Post Thumbnails on posts, pages and more
		add_theme_support( 'post-thumbnails' );

		// Support for custom background settings
		add_theme_support( 'custom-background', array(
			'default-color'			 		=> '#191919',
			'default-repeat'				=> 'repeat',
			'default-attachment'    => 'scroll',
		) );

		// Support for custom header settings
		add_theme_support( 'custom-header', array(
			'default-image'			 			=> '%s/assets/images/header.jpg',
			'random-default'					=> false,
			'width'										=> 960,
			'height'									=> 500,
			'flex-height'							=> false,
			'flex-width'							=> false,
			'header-text'							=> false,
			'uploads'					 				=> true,
		) );

		// Default custom headers packaged with the theme.
		register_default_headers( array(
			'vaping360' => array(
				'url'           => '%s/assets/images/header.jpg',
				'thumbnail_url' => '%s/assets/images/header_thumbnail.jpg',
				'description'   => _x( 'vaping360', 'Vaping individual', 'siggen' )
			)
		) );

		// Adds RSS feed in head
		add_theme_support( 'automatic-feed-links' );
		
		// Make core WordPress makup output valid HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// <title> tag provided by WordPress
		add_theme_support( 'title-tag' );

		// wp_nav_menu() setup
		register_nav_menus( array(
			'header' => __('Header Menu', 'siggen'),
			'footer' => __('Footer Menu', 'siggen')
		));
	}
endif;
add_action( 'after_setup_theme', 'siggen_setup' );

/**
	* Basic widget area structure
	*
	* @since Siggen 1.0
	*/
function siggen_widget_init(){
	register_sidebar( array(
		'name' 					=> __('Top Widget Area', 'siggen'),
		'id' 						=> 'top-widget-area',
		'description'		=> __('Widget area above the content', 'siggen'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Sidebar Widget Area', 'siggen'),
		'id' 						=> 'sidebar-widget-area',
		'description'		=> __('Widget area at the side of the content', 'siggen'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 					=> __('Footer Widget Area', 'siggen'),
		'id' 						=> 'footer-widget-area',
		'description'		=> __('Widget area in the footer', 'siggen'),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'siggen_widget_init' );

/**
	* Custom "Read more" on excerpts
	*
	* @since Siggen 1.0
	*/
function siggen_excerpt_read_more($more) {
	global $post;
	
	if( !get_theme_mod('read_more', true) ){
		return '... <a href="'. esc_url( get_permalink($post->ID) ) . '">Read more</a>';
	}else{
		return '...';
	}
}
add_filter('excerpt_more', 'siggen_excerpt_read_more');

/**
	* Scripts, Styles and fonts
	*
	* @since Siggen 1.0
	*/
function siggen_scripts(){
	// Enqueue the font Open Sans from google
	wp_enqueue_style( 'siggen-fonts', 'https://fonts.googleapis.com/css?family=Alex+Brush|Lora:400,700,400italic,700italic', array(), null);

	// Enqueue Font Awesome (example icon set)
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css', array(), '4.6.3');

	// Enqueue style.css from root theme folder
	wp_enqueue_style( 'siggen-style', get_stylesheet_uri() );

	// Enqueue theme JS and include jQuery
	wp_enqueue_script( 'siggen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), wp_get_theme()->get('Version'), true );

	// Comment-reply script
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'siggen_scripts' );

/**
	* Add classes to body depending on custom changes and content
	*
	* @since Siggen 1.0
	*/
function siggen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-widget-area' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'siggen_body_classes' );

/**
	* Add classes to posts depending on custom changes and content
	*
	* @since Siggen 1.0
	*/
function siggen_post_classes( $classes ) {
	// adds a class of archive-entry to non singular posts
	if( !get_theme_mod( 'display_content', false ) && !is_singular() ){
		$classes[] =  'archive-entry';
	}

	return $classes;
}
add_filter( 'post_class', 'siggen_post_classes' );


/**
	* Customized CSS options
	*
	* @since Siggen 1.2.3
	*/
function siggen_customize_styles(){
	$options = [
		'#'.esc_html( get_background_color() ),
		esc_html( get_theme_mod('text_color', '#fff7ed') ),
		esc_html( get_theme_mod('link_color', '#fff7ed') ),
		esc_html( get_theme_mod('site_info_color', '#fff7ed') ),
		esc_html( get_theme_mod('menu_background_color', '#191919') ),
		esc_html( get_theme_mod('menu_text_color', '#fff7ed') ),
		esc_url( get_header_image() )
	];

	$css = '
		body,
		#scroll-to-top{
			background: %1$s;
		}

		body{ 
				color: %2$s; 
		}

		a{
			color: %3$s;
		}

		#site-information,
		#site-title a,
		#site-tagline{
			color: %4$s;
		}

		#site-information{
			border-color: %4$s;
		}

		#header-menu-container{
			background-color: %5$s;
		}

		.header-menu a{
			color: %6$s;
		}
	';

	if( !get_theme_mod('image_filter', true) ){
		$css .= '
			img{
				-webkit-filter: none;
				filter: none;
			}
		';
	}

	if( has_header_image() ){
		$css .= '
			#header-banner{
				background: url( %7$s );
				-o-background-size: cover;
			  background-size: cover;
			  background-position: center;
			}
		';
	}

	if( !get_theme_mod('center_widgets', true) ){
		$css .= '
			#top-widget-area,
			#footer-widget-area{
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
				-moz-box-pack: justify;
				-ms-flex-pack: justify;
				justify-content: space-between;
			}
		';
	}

	wp_add_inline_style( 'siggen-style', vsprintf($css, $options) );
}
add_action( 'wp_enqueue_scripts', 'siggen_customize_styles' );


/**
	* Included files
	* - Theme functions
	* - WP-Customize
	*
	* @since Siggen 1.0
	*/
require get_template_directory() . '/inc/theme_functions.php';
require get_template_directory() . '/inc/customize.php';

?>