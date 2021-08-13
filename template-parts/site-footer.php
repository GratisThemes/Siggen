<?php
/**
 * Template for displaying the site footer
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

?>
<footer class="site-footer">

  <?php
  if ( has_nav_menu( 'footer' ) ) {
    wp_nav_menu(
      array(
        'theme_location' => 'footer',
        'menu_class'     => 'site-footer-nav',
        'container'      => false,
        'depth'          => 1,
      )
    );
  }
  ?>

  <div class="site-footer-info">
    <?php
    $siggen_site_title = get_bloginfo( 'name' );

    if ( '' !== $siggen_site_title ) {
      printf(
        '<span>%1$s %2$s %3$s</span>',
        esc_html( get_theme_mod( 'footer_text', $siggen_site_title ) ),
        get_theme_mod( 'footer_copyright', true ) ? '&copy;' : '',
        get_theme_mod( 'footer_year', true ) ? gmdate( 'Y' ) : '' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      );
    }
    ?>

    <?php
    if ( get_theme_mod( 'footer_advert', true ) ) {
      $siggen_theme_data = wp_get_theme();

      printf(
        /* translators: %s: Theme name */
        '<span>' . esc_html__( 'Theme: %s', 'siggen' ) . '</span>',
        '<a href="' . esc_url( $siggen_theme_data->get( 'ThemeURI' ) ) . '">' . esc_html( $siggen_theme_data['Name'] ) . '</a>'
      );
    }
    ?>

    <?php
    if ( function_exists( 'the_privacy_policy_link' ) ) {
      the_privacy_policy_link();
    }
    ?>

  </div><!-- .site-footer-info -->

  <?php if ( get_theme_mod( 'scrolltotop', true ) ) : ?>
    <a href="#" id="scroll-to-top">
      <span class="screen-reader-text"><?php esc_html_e( 'Scroll to the top', 'siggen' ); ?></span>
    </a>
  <?php endif; ?>
</footer><!-- .site-footer -->
