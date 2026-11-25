<?php
/**
 * Senja Store functions and definitions.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SENJA_STORE_VERSION', '1.0.0' );

/**
 * Get a theme option with a default value.
 *
 * @param string $key     Option key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function senja_store_get_option( $key, $default = '' ) {
	$defaults = array(
		'senja_hero_show'          => true,
		'senja_hero_title'         => '',
		'senja_hero_subtitle'      => '',
		'senja_hero_button_text'   => '',
		'senja_hero_button_url'    => '',
		'senja_primary_color'      => '#0F766E',
		'senja_show_categories'    => true,
		'senja_show_products'      => true,
		'senja_show_promos'        => true,
		'senja_show_trust'         => true,
		'senja_show_blog'          => true,
		'senja_announcement_text'  => '',
	);
	if ( isset( $defaults[ $key ] ) ) {
		$default = $defaults[ $key ];
	}
	return get_theme_mod( $key, $default );
}

/**
 * Sanitize a checkbox value.
 *
 * @param mixed $checked Input value.
 * @return bool
 */
function senja_store_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === $checked ) ? true : false;
}

/**
 * Sanitize a hex colour.
 *
 * @param string $color Input colour.
 * @return string
 */
function senja_store_sanitize_hex_color( $color ) {
	$sanitized = sanitize_hex_color( $color );
	return $sanitized ? $sanitized : '#0F766E';
}

/**
 * Theme setup.
 */
function senja_store_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 96,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1920,
			'height'      => 600,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'custom-background' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 800,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 6,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 4,
			),
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'senja-store' ),
			'top'     => esc_html__( 'Top Menu', 'senja-store' ),
			'footer'  => esc_html__( 'Footer Menu', 'senja-store' ),
		)
	);
}
add_action( 'after_setup_theme', 'senja_store_setup' );

/**
 * Set the content width.
 */
function senja_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'senja_store_content_width', 1200 );
}
add_action( 'after_setup_theme', 'senja_store_content_width', 0 );

/**
 * Register widget areas.
 */
function senja_store_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'senja-store' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'senja-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'senja-store' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'senja-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'senja-store' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'senja-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'senja-store' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'senja-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'senja_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function senja_store_scripts() {
	wp_enqueue_style( 'senja-store-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap', array(), null );
	wp_enqueue_style( 'senja-store-style', get_stylesheet_uri(), array( 'senja-store-fonts' ), SENJA_STORE_VERSION );
	wp_enqueue_script( 'senja-store-script', get_template_directory_uri() . '/assets/js/senja-store.js', array(), SENJA_STORE_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'senja_store_scripts' );

/**
 * Output the primary colour as inline CSS.
 */
function senja_store_inline_css() {
	$primary = senja_store_sanitize_hex_color( senja_store_get_option( 'senja_primary_color', '#0F766E' ) );
	$css     = ':root{--senja-primary:' . $primary . ';}';
	wp_add_inline_style( 'senja-store-style', $css );
}
add_action( 'wp_enqueue_scripts', 'senja_store_inline_css' );

/**
 * Add a WooCommerce body class on the front page so shop styles apply.
 *
 * @param array $classes Body classes.
 * @return array
 */
function senja_store_body_classes( $classes ) {
	if ( class_exists( 'WooCommerce' ) && ( is_front_page() || is_home() ) ) {
		if ( ! in_array( 'woocommerce', $classes, true ) ) {
			$classes[] = 'woocommerce';
		}
		if ( ! in_array( 'woocommerce-page', $classes, true ) ) {
			$classes[] = 'woocommerce-page';
		}
	}
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'senja_store_body_classes' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/customizer.php';
