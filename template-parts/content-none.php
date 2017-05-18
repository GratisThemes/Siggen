<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Siggen
 * @since Siggen 1.0
 */
?>
<h1 class="page-title"><?php _e( 'Nothing Found', 'siggen' ); ?></h1>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'siggen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'siggen' ); ?></p>

<?php else : ?>
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'siggen' ); ?></p>
	<?php get_search_form(); ?>

<?php endif; ?>
