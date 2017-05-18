<?php
/**
 * Template for displaying 404 pages (not found)
 *
 * @package Siggen
 * @since Siggen 1.0
 */
get_header(); ?>

<div class="site-content container">
	<main>
		<?php get_template_part('template-parts/content_header'); ?>
	
		<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'siggen' ); ?></p>
		<p><?php _e( 'It looks like nothing was found at this location.', 'siggen' ); ?></p>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>