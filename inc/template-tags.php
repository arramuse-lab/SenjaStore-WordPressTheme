<?php
/**
 * Template tags for Senja Store.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print the post date and author.
 */
function senja_store_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
	printf(
		'<span class="posted-on">%1$s</span> <span class="byline">%2$s</span>',
		$time_string,
		sprintf(
			/* translators: %s: post author. */
			esc_html__( 'by %s', 'senja-store' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		)
	);
}

/**
 * Print the post footer (categories, tags, comments link).
 */
function senja_store_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'senja-store' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'senja-store' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'senja-store' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'senja-store' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			esc_html__( 'Leave a comment', 'senja-store' ),
			esc_html__( '1 Comment', 'senja-store' ),
			esc_html__( '% Comments', 'senja-store' )
		);
		echo '</span>';
	}
	edit_post_link(
		esc_html__( 'Edit', 'senja-store' ),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Display the post thumbnail.
 */
function senja_store_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) {
		echo '<div class="post-thumbnail">';
		the_post_thumbnail();
		echo '</div>';
	} else {
		echo '<a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '" aria-hidden="true" tabindex="-1">';
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => esc_attr( the_title_attribute( array( 'echo' => false ) ) ) ) );
		echo '</a>';
	}
}
