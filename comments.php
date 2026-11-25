<?php
/**
 * The template for displaying comments.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$senja_comment_count = get_comments_number();
			if ( '1' === $senja_comment_count ) {
				printf(
					/* translators: %s: post title. */
					esc_html__( 'One thought on &ldquo;%s&rdquo;', 'senja-store' ),
					esc_html( get_the_title() )
				);
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $senja_comment_count, 'comments title', 'senja-store' ) ),
					esc_html( number_format_i18n( $senja_comment_count ) ),
					esc_html( get_the_title() )
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'senja-store' ); ?></p>
			<?php
		endif;
	endif;

	comment_form();
	?>
</div>
