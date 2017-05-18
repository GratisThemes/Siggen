<?php
/**
 * The template part for displaying an Author biography
 *
 * @package Siggen
 * @since Siggen 1.0
 */
if( get_theme_mod( 'author_bio', true ) ): ?>
<div class="author-bio">
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>

	<div>
		<h2 class="author-title">
			<span class="author-heading">
				<?php _e( 'Author:', 'siggen' ); ?>
			</span>

			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_the_author(); ?>
			</a>
		</h2>

		<p>
			<?php the_author_meta( 'description' ); ?>	
		</p>
	</div>
</div>
<?php endif; ?>