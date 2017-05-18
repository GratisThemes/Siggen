<?php
/**
 * The template part for displaying content header
 *
 * @package Siggen
 * @since Siggen 1.1
 */
?>
<header class="content-header">
	<?php siggen_breadcrumbs(); ?>

	<h3 class="content-title"><?php
		if( is_archive() ){
			the_archive_title();
		
		}elseif( is_search() ){
			printf( __( 'Search Results for: %s', 'siggen' ), '<span>' . esc_html( get_search_query() ) . '</span>' );	
		
		}elseif( is_404() ){
			_e( '404 Not Found', 'siggen' );

		}elseif( get_the_title() == '' ){
			_e( 'Untitled Post', 'siggen' );
		
		}else{
			the_title();
		
		}
	?>
	</h3>

	<?php ( is_archive() ) ? the_archive_description( '<div class="content-title-description">', '</div>' ) : false; ?>

	<?php ( is_single() && !is_page() ) ? get_template_part('template-parts/entry_meta') : false; ?>

	<?php if( is_singular() && has_post_thumbnail() && get_theme_mod( 'thumbnail_content', true ) ): ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	
</header>