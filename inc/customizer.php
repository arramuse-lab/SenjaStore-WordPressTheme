<?php
/**
 * Senja Store Customizer.
 *
 * @package Senja_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function senja_store_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'senja_store_home_panel',
		array(
			'title'      => esc_html__( 'Home Sections', 'senja-store' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);

	// Hero section.
	$wp_customize->add_section(
		'senja_hero_section',
		array(
			'title'      => esc_html__( 'Hero', 'senja-store' ),
			'panel'      => 'senja_store_home_panel',
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'senja_hero_show',
		array(
			'default'           => true,
			'sanitize_callback' => 'senja_store_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'senja_hero_show',
		array(
			'label'   => esc_html__( 'Show hero section', 'senja-store' ),
			'section' => 'senja_hero_section',
			'type'    => 'checkbox',
		)
	);
	$wp_customize->add_setting(
		'senja_hero_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'senja_hero_title',
		array(
			'label'   => esc_html__( 'Hero title', 'senja-store' ),
			'section' => 'senja_hero_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'senja_hero_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'senja_hero_subtitle',
		array(
			'label'   => esc_html__( 'Hero subtitle', 'senja-store' ),
			'section' => 'senja_hero_section',
			'type'    => 'textarea',
		)
	);
	$wp_customize->add_setting(
		'senja_hero_button_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'senja_hero_button_text',
		array(
			'label'   => esc_html__( 'Hero button text', 'senja-store' ),
			'section' => 'senja_hero_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'senja_hero_button_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'senja_hero_button_url',
		array(
			'label'   => esc_html__( 'Hero button URL', 'senja-store' ),
			'section' => 'senja_hero_section',
			'type'    => 'url',
		)
	);

	// Colours.
	$wp_customize->add_section(
		'senja_colours_section',
		array(
			'title'      => esc_html__( 'Colours', 'senja-store' ),
			'panel'      => 'senja_store_home_panel',
			'priority'   => 20,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'senja_primary_color',
		array(
			'default'           => '#0F766E',
			'sanitize_callback' => 'senja_store_sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'senja_primary_color',
			array(
				'label'   => esc_html__( 'Primary colour', 'senja-store' ),
				'section' => 'senja_colours_section',
			)
		)
	);
	$wp_customize->add_setting(
		'senja_announcement_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'senja_announcement_text',
		array(
			'label'   => esc_html__( 'Announcement bar text', 'senja-store' ),
			'section' => 'senja_colours_section',
			'type'    => 'text',
		)
	);

	// Home section toggles.
	$wp_customize->add_section(
		'senja_home_toggles_section',
		array(
			'title'      => esc_html__( 'Show or hide sections', 'senja-store' ),
			'panel'      => 'senja_store_home_panel',
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);
	$toggles = array(
		'senja_show_categories' => esc_html__( 'Show categories', 'senja-store' ),
		'senja_show_products'   => esc_html__( 'Show featured products', 'senja-store' ),
		'senja_show_promos'     => esc_html__( 'Show promo cards', 'senja-store' ),
		'senja_show_trust'      => esc_html__( 'Show trust bar', 'senja-store' ),
		'senja_show_blog'       => esc_html__( 'Show latest posts', 'senja-store' ),
	);
	foreach ( $toggles as $setting_id => $label ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => true,
				'sanitize_callback' => 'senja_store_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => 'senja_home_toggles_section',
				'type'    => 'checkbox',
			)
		);
	}
}
add_action( 'customize_register', 'senja_store_customize_register' );
