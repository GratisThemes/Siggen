<?php
/**
 * Template for displaying widgets below the content
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'footer-widget-area' ) ): ?>

  <div id="widget-area-footer" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'footer-widget-area' ); ?>

  </div><!-- #widget-area-footer -->

<?php endif; ?>