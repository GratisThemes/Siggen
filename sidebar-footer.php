<?php
/**
 * Template for displaying widget areas in the footer
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

if (
  ! is_active_sidebar( 'footer-widget-area' ) &&
  ! is_active_sidebar( 'footer-widget-area-two' ) &&
  ! is_active_sidebar( 'footer-widget-area-three' )
) {
  return false;
}
?>
<div class="widget-areas-footer widget-areas">

  <div class="widget-area widget-area-footer widget-area-footer-one" role="complementary">
    <?php
    if ( is_active_sidebar( 'footer-widget-area' ) ) {
      dynamic_sidebar( 'footer-widget-area' );
    }
    ?>
  </div>

  <div class="widget-area widget-area-footer widget-area-footer-two" role="complementary">
    <?php
    if ( is_active_sidebar( 'footer-widget-area-two' ) ) {
      dynamic_sidebar( 'footer-widget-area-two' );
    }
    ?>
  </div>

  <div class="widget-area widget-area-footer widget-area-footer-three" role="complementary">
    <?php
    if ( is_active_sidebar( 'footer-widget-area-three' ) ) {
      dynamic_sidebar( 'footer-widget-area-three' );
    }
    ?>
  </div>

</div><!-- .widget-areas-footer -->
