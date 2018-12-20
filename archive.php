<?php
/**
 * Template for displaying archives
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">

  <main id="site-main" role="main">

    <header class="page-header">
      <?php the_archive_title( '<h1>', '</h1>' ); ?>
      <?php the_archive_description(); ?>
    </header>

    <?php if ( have_posts() ): ?>
    
      <?php while ( have_posts() ): the_post(); ?>
    
        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

      <?php endwhile; ?>

      <?php
      the_posts_navigation( array(
        'prev_text' => __( 'Back', 'siggen' ),
        'next_text' => __( 'Next', 'siggen' ),
      ) );
      ?>

    <?php else: ?>
      
      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif;?>
    
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_footer(); ?>