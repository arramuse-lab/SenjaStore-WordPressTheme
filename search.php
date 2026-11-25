<?php
/**
 * The template for displaying search results pages.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<div class="senja-content-wrap">
		<div class="site-content">
			<div id="primary-content">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title">
							<?php
							printf(
								/* translators: %s: search query. */
								esc_html__( 'Search Results for: %s', 'senja-store' ),
								'<span>' . esc_html( get_search_query() ) . '</span>'
							);
							?>
						</h1>
					</header>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
