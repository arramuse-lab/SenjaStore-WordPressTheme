<?php
/**
 * Category pill row shown under the header.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$senja_categories = array();
if ( class_exists( 'WooCommerce' ) ) {
	$senja_terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'number'     => 8,
		)
	);
	if ( ! is_wp_error( $senja_terms ) && ! empty( $senja_terms ) ) {
		foreach ( $senja_terms as $senja_term ) {
			$senja_categories[] = array(
				'name' => $senja_term->name,
				'url'  => get_term_link( $senja_term ),
			);
		}
	}
}
if ( empty( $senja_categories ) ) {
	$senja_categories = array(
		array(
			'name' => esc_html__( 'All Products', 'senja-store' ),
			'url'  => esc_url( home_url( '/' ) ),
		),
		array(
			'name' => esc_html__( 'New Arrivals', 'senja-store' ),
			'url'  => esc_url( home_url( '/' ) ),
		),
		array(
			'name' => esc_html__( 'Best Sellers', 'senja-store' ),
			'url'  => esc_url( home_url( '/' ) ),
		),
		array(
			'name' => esc_html__( 'Sale', 'senja-store' ),
			'url'  => esc_url( home_url( '/' ) ),
		),
	);
}
?>
<div class="senja-category-pills">
	<div class="senja-container">
		<ul>
			<?php foreach ( $senja_categories as $senja_category ) : ?>
				<li><a href="<?php echo esc_url( $senja_category['url'] ); ?>"><?php echo esc_html( $senja_category['name'] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
