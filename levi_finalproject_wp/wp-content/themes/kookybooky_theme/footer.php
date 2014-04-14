<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kookybooky_theme
 */
?>

	</section><!-- #content -->

	<section id="footer-bg">
		<footer id="colophon" class="site-footer container" role="contentinfo">
			<nav class="social-media-footer-navigation col-xs-4">
				<?php echo wen_social_links(); ?>
			</nav>

			<div class="site-info col-xs-8 text-right">
				<a href="#">Back to Top</a><span class="seperator">&nbsp;&#124;</span>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kookybooky_theme' ) ); ?>"><?php printf( __( 'Built with %s', 'kookybooky_theme' ), 'WordPress' ); ?></a>
				<a href="http://www.deepindigodesign.com">by Levi Stephen</a>
				<span class="copyright">&copy; <?php echo date('Y'); ?></span>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</section><!-- #footer-bg -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
