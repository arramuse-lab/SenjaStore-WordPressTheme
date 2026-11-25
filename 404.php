<?php
/**
 * The template for displaying 404 pages.
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
		<section class="senja-not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page cannot be found.', 'senja-store' ); ?></h1>
			</header>
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'senja-store' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
