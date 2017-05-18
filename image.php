<?php
/**
 * Template for displaying images
 *
 * @package Siggen
 * @since Siggen 1.2.1
 */
get_header(); ?>

<div class="site-content container">
	<main>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part('template-parts/content_header'); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-attachment">
            <?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
            <?php the_excerpt(); ?>
        </div>
      </article>

      <nav id="image-navigation" class="navigation image-navigation">
        <div class="nav-links">
          <div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'siggen' ) ); ?></div>
          <div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'siggen' ) ); ?></div>
        </div><!-- .nav-links -->
      </nav><!-- .image-navigation -->

      <?php if ( comments_open() || get_comments_number() ):
        comments_template();
      endif; ?>
    <?php endwhile; ?>
	</main>
	
	<?php get_sidebar(); ?>
</div>

<?php	get_footer(); ?>