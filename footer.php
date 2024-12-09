<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nepalmega
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container d-flex justify-center">
			<div class="site-info">
				<div class="footer contact text-center">
				<?php
					$phone   = get_theme_mod('contact_phone', 'Not Available');
					$email   = get_theme_mod('contact_email', 'Not Available');
					$address = get_theme_mod('contact_address', 'Not Available');
					$map     = get_theme_mod('contact_map', '');
				?>

				<div class="contact-info d-flex align-items-center">
					<p><strong>Phone:</strong> <?php echo esc_html($phone); ?></p>
					<p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
					<p><strong>Address:</strong> <?php echo nl2br(esc_html($address)); ?></p>
					<?php if ($map) : ?>
						<div class="map"><?php echo $map; // Map embed code (ensure it's sanitized appropriately) ?></div>
					<?php endif; ?>
				</div>

				</div>
				<a href="<?php echo esc_url('https://www.nepalmegacollege.edu.np/', 'Nepal Mega College' ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'Nepal Mega College' ), 'Nepal Mega College' );
					?>
				</a>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
