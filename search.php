<?php
/**
 * Template for displaying search results
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">

  <main id="site-main" role="main">
    
    <header class="page-header">
      <?php
      if ( have_posts() ) {
        printf(
          '<h1>' . __( 'Search results for: %s', 'siggen' ) . '</h1>',
          '<span>' . esc_html( get_search_query() ) . '</span>'
        );
      } else {
        printf(
          '<h1>' . __( 'Nothing found', 'siggen' ) . '</h1>'
        );
      }
      ?>
    </header>

    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', 'excerpt');
      }

      the_posts_pagination( array(
        'prev_text' => __( 'Prev', 'siggen' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'siggen' ) . '</span>',
        'next_text' => __( 'Next', 'siggen' ) . '<span class="screen-reader-text">' . __( 'Next page', 'siggen' ) . '</span>',
        'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'siggen' ) . '</span>'
      ) );
    
    } else {
      
      get_template_part( 'template-parts/content', 'none');
    
    }
    ?>
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-container -->

<?php get_footer(); ?>