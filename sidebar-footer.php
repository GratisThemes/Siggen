<?php
/**
 * Template for displaying a widget area and additional content in the footer
 *
 * @package Siggen
 * @since Siggen 1.0
 */
if ( is_active_sidebar( 'footer-widget-area' )  ) : ?>
	<div id="footer-widget-area" class="sidebar widget-area container" role="complementary">
		<?php dynamic_sidebar( 'footer-widget-area' ); ?>
	</div><!-- #footer-widget-area .sidebar .widget-area -->
<?php endif; ?>