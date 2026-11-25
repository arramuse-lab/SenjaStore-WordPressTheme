<?php
/**
 * Template part for displaying posts.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php senja_store_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<?php senja_store_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'senja-store' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					esc_html( get_the_title() )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'senja-store' ),
					'after'  => '</div>',
				)
			);
		} else {
			the_excerpt();
			echo '<p><a class="senja-btn senja-btn--outline" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read more', 'senja-store' ) . '</a></p>';
		}
		?>
	</div>

	<footer class="entry-footer">
		<?php senja_store_entry_footer(); ?>
	</footer>
</article>
