<?php
/**
 * Template for displaying pages
 *
 * @package Siggen
 * @since Siggen 1.0
 */
get_header(); ?>

<div class="site-content container">
	<main>
		<?php get_template_part('template-parts/content'); ?>

		<?php if( comments_open() || get_comments_number() ) comments_template(); ?>
	</main>
	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>