<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Siggen
 * @since Siggen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="site-header" class="container">
		<?php if ( has_nav_menu( 'header' ) ):?>
			<i class="fa fa-bars menu-toggle"></i>
		<?php endif; ?>
		
		<?php siggen_social_media(); ?>

		<?php if ( has_nav_menu( 'header' ) ): ?>
			<div id="header-menu-container">
				<i class="fa fa-times menu-toggle"></i>

				<?php wp_nav_menu( array(
					'theme_location'	=> 'header',
					'menu_class'			=> 'header-menu',
				) ); ?>
			</div>
		<?php endif; ?>
	</header>

	<div id="header-banner">

		<div class="header-banner-inner container">
			<div id="site-information">
			
				*

				<?php if( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>

				<?php if( get_theme_mod('display_site_title', true) ): ?>
					<h1 id="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php endif; ?>
				
				*

				<?php if( get_theme_mod('display_tagline', true) ):?>
					<p id="site-tagline"><?php bloginfo( 'description' ) ?></p>	
					*
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php get_sidebar('top'); ?>