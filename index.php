<?php
/**
 * Template for displaying landing page (home)
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">
  
  <main id="site-main" role="main">

    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {

      the_post();
      
      $siggen_post_format = get_post_format();

      if ( $siggen_post_format || get_theme_mod( 'display_content', false ) ) {

        get_template_part( 'template-parts/content', $siggen_post_format );

      } else {

        get_template_part( 'template-parts/content', 'excerpt' );

      }
    
    }

      the_posts_navigation( array(
        'prev_text' => __( 'Back', 'siggen' ),
        'next_text' => __( 'Next', 'siggen' ),
      ) );
      
    } else {
      
      get_template_part( 'template-parts/content', 'none' );
    
    }
    ?>

  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_footer(); ?>