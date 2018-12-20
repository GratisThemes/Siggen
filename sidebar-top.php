<?php
/**
 * Template for displaying widgets above the content
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'top-widget-area' ) ): ?>

  <div id="widget-area-top" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'top-widget-area' ); ?>

  </div><!-- #widget-area-top -->

<?php endif; ?>