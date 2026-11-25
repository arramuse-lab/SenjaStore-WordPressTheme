<?php
/**
 * The footer for Senja Store.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer id="colophon" class="site-footer">
	<div class="senja-container">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="senja-footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		<?php endif; ?>

		<div class="senja-footer-bottom">
			<div class="site-info">
				<?php
				printf(
					/* translators: %1$s: site name, %2$s: current year. */
					esc_html__( 'Copyright %2$s %1$s. All rights reserved.', 'senja-store' ),
					esc_html( get_bloginfo( 'name' ) ),
					esc_html( gmdate( 'Y' ) )
				);
				?>
			</div>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-menu" aria-label="<?php esc_attr_e( 'Footer Menu', 'senja-store' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-menu',
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
