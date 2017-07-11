<?php

/**
 * BuddyPress Body Classes
 *
 * @package BuddypressBodyClasses
 * @author Ryan Williams
 * @license GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: BuddyPress Body Classes
 * Version: pre-alpha
 * Description: Add Buddypress identifiers e.g. group ID to the <body> tag.
 * Author: Ryan Williams
 * Author URI: http://github.com/modelm
 * Text Domain: buddypress-body-classes
 * Domain Path: /languages
 */

/**
 * TODO make slug prefixes translatable
 */
function bpbc_add_identifiers_to_body_class( $classes ) {
	if ( bp_current_component() ) {
		$classes[] = 'bp-component-' . bp_current_component();
	}
	if ( bp_current_action() ) {
		$classes[] = 'bp-action-' . bp_current_action();
	}
	if ( bp_current_item() ) {
		$classes[] = 'bp-item-' . bp_current_item();
	}
	if ( bp_get_current_group_id() ) {
		$classes[] = 'bp-group-' . bp_get_current_group_id();
	}
	if ( bp_displayed_user_id() ) {
		$classes[] = 'bp-displayed-user-' . bp_displayed_user_id();
	}
	if ( bp_loggedin_user_id() ) {
		$classes[] = 'bp-loggedin-user-' . bp_loggedin_user_id();
	}

	if ( get_current_network_id() ) {
		$classes[] = 'network-' . get_current_network_id();
	}
	if ( get_current_blog_id() ) {
		$classes[] = 'blog-' . get_current_blog_id();
	}

	return $classes;
}
add_filter( 'body_class', 'bpbc_add_identifiers_to_body_class' );
