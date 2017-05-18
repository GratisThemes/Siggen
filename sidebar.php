<?php
/**
 * Template for displaying a widget area and additional content
 *
 * @package Siggen
 * @since Siggen 1.0
 */

if ( is_active_sidebar( 'sidebar-widget-area' )  ) : ?>
	<aside id="sidebar-widget-area" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
	</aside><!-- #sidebar-widget-area .sidebar .widget-area -->
<?php endif; ?>