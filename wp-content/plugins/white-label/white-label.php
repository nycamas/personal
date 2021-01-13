<?php
/**
 * Plugin Name:       White Label
 * Plugin URI:  			https://whitewp.com
 * Description:       White Label allows your agency to customise WP branding, admin area, dashboard, and login logo.
 * Version:           1.4.2
 * Author:            Morgan Hvidt
 * Author URI:        https://whitewp.com/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Start White label
function white_label_run_admin() {
	require plugin_dir_path( __FILE__ ) . 'admin/admin.php';
	require plugin_dir_path( __FILE__ ) . 'admin/admin-boxes.php';
}
add_action( 'init', 'white_label_run_admin' );

function white_label_run_functions() {

	$white_label_section_start = get_option( 'white_label_section_start' );
	// Start WL settings if enabled and exists
	if ( $white_label_section_start && in_array( 'on', $white_label_section_start ) ) {
		include plugin_dir_path( __FILE__ ) . 'includes/functions.php';
	}
}
add_action( 'init', 'white_label_run_functions' );

// Custom Dashboard if turned on
$white_label_custom_dashboard = get_option( 'white_label_custom_dashboard_switch' );

if ( $white_label_custom_dashboard && in_array( 'on', $white_label_custom_dashboard ) ) {
	include plugin_dir_path( __FILE__ ) . 'includes/custom-dashboard-page.php';
}

// function white_label_activate() {
//
// }
// // register_activation_hook( __FILE__, 'white_label_activate' );

register_uninstall_hook( __FILE__, 'white_label_delete_all_options' );
// Delete all options on uninstall
function white_label_delete_all_options() {

	foreach ( wp_load_alloptions() as $option => $value ) {
		if ( strpos( $option, 'white_label_' ) === 0 ) {
			delete_option( $option );
		}
	}
}
