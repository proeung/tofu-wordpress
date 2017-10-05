<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tofu
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<nav id="footer-site-navigation" class="footer-main-navigation" role="navigation">
			<?php tofu_footer_menu_main();?>
		</nav><!-- #footer-site-navigation -->
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tofu' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'tofu' ), 'WordPress' );
			?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
