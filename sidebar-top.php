<?php
/**
 * Template for displaying widgets above the content
 *
 * @package Siggen
 * @since   Siggen 1.0
 */

if ( ! is_home() && ! is_front_page() ) {
  return;
}

if (
  ! is_active_sidebar( 'top-widget-area' ) &&
  ! is_active_sidebar( 'top-widget-area-two' ) &&
  ! is_active_sidebar( 'top-widget-area-three' )
) {
  return false;
}
?>
<div class="widget-areas-top widget-areas">

    <div class="widget-area widget-area-top widget-area-top-one" role="complementary">
      <?php
      if ( is_active_sidebar( 'top-widget-area' ) ) {
        dynamic_sidebar( 'top-widget-area' );
      }
      ?>
    </div>

    <div class="widget-area widget-area-top widget-area-top-two" role="complementary">
      <?php
      if ( is_active_sidebar( 'top-widget-area-two' ) ) {
        dynamic_sidebar( 'top-widget-area-two' );
      }
      ?>
    </div>

    <div class="widget-area widget-area-top widget-area-top-three" role="complementary">
      <?php
      if ( is_active_sidebar( 'top-widget-area-three' ) ) {
        dynamic_sidebar( 'top-widget-area-three' );
      }
      ?>
    </div>

</div><!-- .widget-areas-top -->
