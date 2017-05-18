<?php
/**
 * Content loop
 *
 * @package Siggen
 * @since Siggen 1.2.1
 */
if( have_posts() ):
	while( have_posts() ): the_post(); ?>		
		<article <?php post_class(); ?>>
			<header class="archive-entry-header">
				<?php if( get_the_title() != '' ){
					the_title('<h3><a href="'.esc_url( get_the_permalink() ).'">','</a></h3>'); 
				}else{
					printf('<h3><a href="%1$s">%2$s</a></h3>',
						esc_url( get_the_permalink() ),
						__('Untitled post', 'siggen')
					);
				}

				get_template_part('template-parts/entry_meta'); ?>
			</header>
			
			<?php if( has_post_thumbnail() && get_theme_mod('thumbnail_index', true) ): ?>
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</a>
			<?php endif; ?>
		
			<?php if( get_theme_mod( 'display_content', false ) ):
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'siggen' ),
					get_the_title()
				) );
			else:
				the_excerpt();

				if( get_theme_mod('read_more', true) ): ?>
					<a class="read-more button" title="<?php esc_attr( the_title() ); ?>" href="<?php the_permalink(); ?>">
						<?php _e( 'Read more', 'siggen' ); ?>
					</a>
				<?php endif;
			endif; ?>
			<div style="clear: both; height: 0px;">&nbsp;</div>
		</article>
	<?php endwhile;

	the_posts_navigation( array(
		'prev_text' => __( 'Back', 'siggen' ),
		'next_text' => __( 'Next', 'siggen' ),
	) );

else:
	
	get_template_part( 'template-parts/content', 'none' );

endif; ?>