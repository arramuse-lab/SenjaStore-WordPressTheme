<?php
/**
 * The front page template for Senja Store.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<div class="senja-container">

		<?php if ( senja_store_get_option( 'senja_hero_show', true ) ) : ?>
			<?php
			$senja_hero_title = senja_store_get_option( 'senja_hero_title', '' );
			if ( '' === $senja_hero_title ) {
				$senja_hero_title = esc_html__( 'Everyday essentials, beautifully made', 'senja-store' );
			}
			$senja_hero_subtitle = senja_store_get_option( 'senja_hero_subtitle', '' );
			if ( '' === $senja_hero_subtitle ) {
				$senja_hero_subtitle = esc_html__( 'Shop quality products for your home, style and daily life — with fast delivery and easy returns.', 'senja-store' );
			}
			$senja_hero_button_text = senja_store_get_option( 'senja_hero_button_text', '' );
			if ( '' === $senja_hero_button_text ) {
				$senja_hero_button_text = esc_html__( 'Shop Now', 'senja-store' );
			}
			$senja_hero_button_url = senja_store_get_option( 'senja_hero_button_url', '' );
			if ( '' === $senja_hero_button_url ) {
				$senja_hero_button_url = esc_url( home_url( '/' ) );
			}
			?>
			<section class="senja-hero" aria-label="<?php esc_attr_e( 'Featured', 'senja-store' ); ?>">
				<div class="senja-hero-inner">
					<div>
						<p class="senja-hero-eyebrow"><?php esc_html_e( 'New collection', 'senja-store' ); ?></p>
						<h1 class="senja-hero-title"><?php echo esc_html( $senja_hero_title ); ?></h1>
						<p><?php echo esc_html( $senja_hero_subtitle ); ?></p>
						<div class="senja-hero-actions">
							<a class="senja-btn senja-btn--amber" href="<?php echo esc_url( $senja_hero_button_url ); ?>"><?php echo esc_html( $senja_hero_button_text ); ?></a>
							<a class="senja-btn senja-btn--outline" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:#fff;border-color:#fff;"><?php esc_html_e( 'Browse Categories', 'senja-store' ); ?></a>
						</div>
					</div>
					<div class="senja-hero-visual">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.jpg' ); ?>" alt="<?php esc_attr_e( 'Featured products', 'senja-store' ); ?>" width="800" height="600">
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( senja_store_get_option( 'senja_show_products', true ) ) : ?>
			<section class="senja-section" aria-label="<?php esc_attr_e( 'Featured products', 'senja-store' ); ?>">
				<div class="senja-section-head">
					<h2><?php esc_html_e( 'Featured Products', 'senja-store' ); ?></h2>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'View all products', 'senja-store' ); ?> &rarr;</a>
					<?php endif; ?>
				</div>
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<?php echo do_shortcode( '[products limit="4" columns="4" visibility="featured"]' ); ?>
				<?php else : ?>
					<div class="senja-product-grid">
						<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
							<article class="senja-product-card">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.jpg' ); ?>" alt="<?php esc_attr_e( 'Product placeholder', 'senja-store' ); ?>" width="800" height="600">
								<h3><?php printf( esc_html__( 'Sample Product %d', 'senja-store' ), absint( $i ) ); ?></h3>
								<span class="price"><?php esc_html_e( '$24.00', 'senja-store' ); ?></span>
								<a class="senja-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'View Product', 'senja-store' ); ?></a>
							</article>
						<?php endfor; ?>
					</div>
					<p><?php esc_html_e( 'Install WooCommerce to show real products here.', 'senja-store' ); ?></p>
				<?php endif; ?>
			</section>
		<?php endif; ?>

		<?php if ( senja_store_get_option( 'senja_show_promos', true ) ) : ?>
			<section class="senja-section" aria-label="<?php esc_attr_e( 'Promotions', 'senja-store' ); ?>">
				<div class="senja-promos">
					<div class="senja-promo senja-promo--teal">
						<h3><?php esc_html_e( 'Made for everyday living', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( 'Thoughtful designs, honest materials and prices that make sense.', 'senja-store' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Explore the collection', 'senja-store' ); ?> &rarr;</a>
					</div>
					<div class="senja-promo senja-promo--amber">
						<h3><?php esc_html_e( 'New this season', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( 'Fresh arrivals, updated weekly.', 'senja-store' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'See what is new', 'senja-store' ); ?> &rarr;</a>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( senja_store_get_option( 'senja_show_trust', true ) ) : ?>
			<section class="senja-section" aria-label="<?php esc_attr_e( 'Why shop with us', 'senja-store' ); ?>">
				<div class="senja-trust">
					<div class="senja-trust-item">
						<span class="senja-trust-icon" aria-hidden="true">&#128666;</span>
						<h3><?php esc_html_e( 'Fast Delivery', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( 'Free shipping on orders over $50', 'senja-store' ); ?></p>
					</div>
					<div class="senja-trust-item">
						<span class="senja-trust-icon" aria-hidden="true">&#128272;</span>
						<h3><?php esc_html_e( 'Secure Payments', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( 'Encrypted checkout you can trust', 'senja-store' ); ?></p>
					</div>
					<div class="senja-trust-item">
						<span class="senja-trust-icon" aria-hidden="true">&#8635;</span>
						<h3><?php esc_html_e( 'Easy Returns', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( '30-day hassle-free returns', 'senja-store' ); ?></p>
					</div>
					<div class="senja-trust-item">
						<span class="senja-trust-icon" aria-hidden="true">&#9742;</span>
						<h3><?php esc_html_e( 'Helpful Support', 'senja-store' ); ?></h3>
						<p><?php esc_html_e( 'We are here to help, every day', 'senja-store' ); ?></p>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( senja_store_get_option( 'senja_show_blog', true ) ) : ?>
			<section class="senja-section" aria-label="<?php esc_attr_e( 'Latest posts', 'senja-store' ); ?>">
				<div class="senja-section-head">
					<h2><?php esc_html_e( 'Latest Posts', 'senja-store' ); ?></h2>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'View all posts', 'senja-store' ); ?> &rarr;</a>
				</div>
				<?php
				$senja_blog_query = new WP_Query(
					array(
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
					)
				);
				if ( $senja_blog_query->have_posts() ) :
					?>
					<div class="senja-post-grid">
						<?php
						while ( $senja_blog_query->have_posts() ) :
							$senja_blog_query->the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						?>
					</div>
					<?php
					wp_reset_postdata();
				else :
					?>
					<p><?php esc_html_e( 'No posts yet. Publish your first post to see it here.', 'senja-store' ); ?></p>
				<?php endif; ?>
			</section>
		<?php endif; ?>

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				if ( '' !== trim( get_the_content() ) ) {
					get_template_part( 'template-parts/content', 'page' );
				}
			endwhile;
		endif;
		?>

	</div>
</main>

<?php
get_footer();
