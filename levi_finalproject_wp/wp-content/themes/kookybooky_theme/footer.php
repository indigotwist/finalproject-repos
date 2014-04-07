<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kookybooky_theme
 */
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<nav class="social-media-footer-navigation">
				<?php echo wen_social_links(); ?>
			</nav>

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kookybooky_theme' ) ); ?>"><?php printf( __( 'Built with %s', 'kookybooky_theme' ), 'WordPress' ); ?></a>
				<a href="http://www.deepindigodesign.com">by Levi Stephen</a>
				<span class="copyright">&copy; <?php echo date('Y'); ?></span>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</section><!-- .wrapper -->

	<section class="footer-bg">
		<div class="footer-green-bar"></div>
		<div class="footer-checkered-rule"></div>
	</section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
