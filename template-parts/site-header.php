<?php
/**
 * Template for displaying the site's main header
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

?>

<nav class="site-header">

  <?php if ( has_nav_menu( 'header' ) ) : ?>
    <input type="checkbox" id="header-nav-toggle" />

    <label for="header-nav-toggle" class="header-nav-toggle-label">
      <span></span>
      <span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'siggen' ); ?></span>
    </label><!-- .header-nav-toggle-label -->

    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'header',
        'menu_class'     => 'header-nav',
        'container'      => false,
      )
    );
    ?>
  <?php endif; ?>

  <?php siggen_social_links(); ?>

</nav>
