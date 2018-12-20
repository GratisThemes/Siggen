<?php
/**
 * Template for displaying songle post content
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">

  <main id="site-main" role="main">

    <?php while ( have_posts() ): the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

      <?php if ( comments_open() || get_comments_number() ) comments_template(); ?>

    <?php endwhile; ?>

  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_footer(); ?>