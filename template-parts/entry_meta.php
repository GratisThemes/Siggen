<?php
/**
 * The template part for displaying post meta data
 *
 * @package Siggen
 * @since Siggen 1.0
 */
?>
<div class="entry-meta"><?php
	// author link
	if( get_theme_mod( 'entry_meta_author', true ) ){
		printf( '<span><i class="fa fa-user"></i> <a href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
			);
	}
	
	// posted date
	if( get_theme_mod( 'entry_meta_date', true ) ){
		printf( '<span><i class="fa fa-calendar"></i> <a href="%1$s">%2$s</a></span>',
			esc_url( get_permalink() ),
			get_the_date()
		);
	}

	// attachment image dimentions
	if( wp_attachment_is_image() ){
		$metadata = wp_get_attachment_metadata();

		printf( '<span><i class="fa fa-camera"></i> %1$s x %2$s</span>',
			absint( $metadata['width'] ),
			absint( $metadata['height'] )
		);
	}

	// comments
	$siggen_comments_count = get_comments_number();
	if( get_theme_mod( 'entry_meta_comments', true ) && $siggen_comments_count > 0 && comments_open() ){
		
		printf( '<span><i class="fa fa-comment-o"></i> <a href="%1$s/#comments">%2$s</a></span>',
			esc_url( get_permalink() ), 
			$siggen_comments_count
		);
	}

		// post format
	$siggen_format = get_post_format();
	if ( get_theme_mod( 'entry_meta_post_format', true ) && current_theme_supports( 'post-formats', $siggen_format ) ):

		switch($siggen_format){
			case 'gallery':
			case 'image':
				$siggen_class = 'fa-image';
				break;

			case 'video':
				$siggen_class = 'fa-file-video-o';
				break;

			case 'quote':
				$siggen_class = 'fa-quote-right';
				break;

			case 'link':
				$siggen_class = 'fa-link';
				break;

			case 'status':
				$siggen_class = 'fa-exclamation';
				break;

			case 'audio':
				$siggen_class = 'fa-music';
				break;

			case 'chat':
				$siggen_class = 'fa-comments';
				break;

			default:
				$siggen_class = 'fa-file-o';
				break;
		}

		printf( '<span class="entry-format"><i class="fa ' . $siggen_class . '"></i> %1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'siggen' ) ),
			esc_url( get_post_format_link( $siggen_format ) ),
			get_post_format_string( $siggen_format )
		); ?>
	<?php endif; ?>

	<?php if( is_user_logged_in() ): // edit link ?>
		<span>
			<i class="fa fa-pencil"></i>
			<?php edit_post_link( __('Edit', 'siggen') ); ?>
		</span>
	<?php endif; ?>
	
	<?php // categories
	if( get_theme_mod( 'entry_meta_categories', true ) && has_category() ): ?>
		<span>
			<i class="fa fa-folder"></i>
			<?php the_category(', '); ?>
		</span>
	<?php endif; ?>
</div>