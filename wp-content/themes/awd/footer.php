<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Advanced_Web_Dev
 */

?>

			</div><!-- #content -->
		</div>
	</div>
	
	
	<div class="footer-area full">
		<div class="main-page">
			<footer id="colophon" class="site-footer inner" role="contentinfo">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'awd' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'awd' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'awd' ), 'awd', '<a href="http://underscores.me/" rel="designer">Matt Allen</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div>	
	</div>

<?php wp_footer(); ?>

</body>
</html>
