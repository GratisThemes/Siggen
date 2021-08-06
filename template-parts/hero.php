<?php
/**
 * Template for displaying the hero section
 *
 * @package Siggen
 * @since   Siggen 2.0
 */

?>

<header class="hero">

  <div class="site-branding">
    <?php if ( get_theme_mod( 'display_site_title', true ) ) : ?>
      <?php if ( is_front_page() && ! is_paged() ) : ?>
        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1><!-- .site-title -->
      <?php elseif ( is_front_page() || is_home() ) : ?>
        <h1 class="site-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
        </h1><!-- .site-title -->
      <?php else : ?>
        <p class="site-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
        </p><!-- .site-title -->
      <?php endif; ?>
    <?php endif; ?>

    <?php
    if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
    }
    ?>

    <?php if ( get_theme_mod( 'display_tagline', true ) ) : ?>
      <p class="site-tagline"><?php bloginfo( 'description' ); ?></p><!-- .site-tagline -->
    <?php endif; ?>
  </div><!-- .site-branding -->

</header>
