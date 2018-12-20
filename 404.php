<?php
/**
 * Template for displaying 404 Not Found error
 *
 * @package Siggen
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container">

  <main id="site-main" role="main">

    <section class="error-404 not-found">

      <header class="page-header">
        <h1><?php _e( '404 Not Found', 'siggen' ); ?></h1>
      </header>

      <div class="entry-content">
        <p>
          <?php _e( 'Oops! That page can&rsquo;t be found.', 'siggen' ); ?>
          <br />
          <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'siggen' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div><!-- .entry-content -->

    </section><!-- .error-404 -->

</main><!-- #site-main -->

</div><!-- #main-content-container -->

<?php get_footer(); ?>