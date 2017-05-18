<?php
/**
 * Template for displaying the footer
 *
 * @package Siggen
 * @since Siggen 1.0
 */
?>
<footer id="site-footer">
	<?php get_sidebar('footer'); ?>
	
	<?php if ( has_nav_menu( 'footer' ) ):
		wp_nav_menu( array(
			'theme_location' => 'footer',
			'menu_class'     => 'footer-menu',
			'depth'					 =>	'1',
			'container_id'	 => 'footer-menu-container'
		) );
	endif; ?>
	
	<div id="footer-information">
		<span>
			<?php echo esc_html( get_theme_mod( 'footer_text', get_bloginfo('name') ) ); ?> 
			<?php if( get_theme_mod( 'footer_copyright', true ) ): ?>&copy;<?php endif; ?> 
			<?php if( get_theme_mod( 'footer_year', true) ): echo date("Y"); endif; ?> 
		</span>
		
		<?php if( get_theme_mod( 'footer_advert', true) ): ?>
			<span>
				<?php
					$siggen_theme_data = wp_get_theme();

					printf( __( 'Theme: <a href="%2$s">%1$s</a>', 'siggen' ),
						$siggen_theme_data['Name'],
						esc_url( $siggen_theme_data->get( 'ThemeURI' ) )
					);
				?>
			</span>
		<?php endif; ?>
	</div>

	<?php if ( get_theme_mod( 'scrolltotop', true ) ) { ?>
		<a id="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>
	<?php } ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>