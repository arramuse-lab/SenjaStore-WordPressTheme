<?php
/**
 * The header for Senja Store.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'senja-store' ); ?></a>

<?php
$announcement = senja_store_get_option( 'senja_announcement_text', '' );
if ( '' === $announcement ) {
	$announcement = esc_html__( 'Free shipping on orders over $50', 'senja-store' );
}
?>
<div class="senja-announcement"><p><?php echo esc_html( $announcement ); ?></p></div>

<header id="masthead" class="site-header">
	<div class="senja-header-inner">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			}
			?>
			<div>
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) {
					echo '<p class="site-description">' . esc_html( $description ) . '</p>';
				}
				?>
			</div>
		</div>

		<div class="senja-header-search">
			<?php get_search_form(); ?>
		</div>

		<div class="senja-header-actions">
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" aria-label="<?php esc_attr_e( 'My account', 'senja-store' ); ?>">
					<span aria-hidden="true">&#128100;</span>
				</a>
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'View cart', 'senja-store' ); ?>">
					<span aria-hidden="true">&#128722;</span>
					<?php $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
					<span class="senja-cart-count"><?php echo esc_html( $count ); ?></span>
				</a>
			<?php endif; ?>
			<button class="senja-menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'senja-store' ); ?></button>
		</div>
	</div>

	<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'senja-store' ); ?>">
		<div class="senja-container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => false,
				)
			);
			?>
		</div>
	</nav>

	<?php get_template_part( 'template-parts/category', 'pills' ); ?>
</header>
