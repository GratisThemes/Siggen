<?php
/**
 * Template for displaying a widget area and additional content
 *
 * @package Siggen
 * @since Siggen 1.0
 */
if ( is_active_sidebar( 'top-widget-area' )  ) : ?>
	<div id="top-widget-area" class="sidebar widget-area container" role="complementary">
		<?php dynamic_sidebar( 'top-widget-area' ); ?>
	</div><!-- #top-widget-area .sidebar .widget-area -->
<?php endif; ?>