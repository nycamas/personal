<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// ---------------- ADMIN AREA ----------------
$white_label_admin_area = get_option( 'white_label_admin_area' );

// Remove WordPress Logo in Admin Bar
if ( $white_label_admin_area && in_array( 'remove-wp-logo-admin-bar', $white_label_admin_area ) ) {

	function white_label_remove_wp_logo( $wp_admin_bar ) {
		$wp_admin_bar->remove_menu( 'about' );
		$wp_admin_bar->remove_menu( 'wporg' );
		$wp_admin_bar->remove_menu( 'documentation' );
		$wp_admin_bar->remove_menu( 'support-forums' );
		$wp_admin_bar->remove_menu( 'feedback' );
		$wp_admin_bar->remove_node( 'wp-logo' );
	}

	add_action( 'admin_bar_menu', 'white_label_remove_wp_logo', 999 );

}

// Replace Howdy text with welcome
function white_label_change_howdy( $wp_admin_bar ) {

	$white_label_admin_howdy = get_option( 'white_label_admin_howdy' );

	if ( $white_label_admin_howdy ) {

		$wl_get_howdy = $wp_admin_bar->get_node( 'my-account' );

		$wl_replacement = preg_replace( '/^[^,]*,\s*/', $white_label_admin_howdy . ' ', $wl_get_howdy->title );
		$wp_admin_bar->add_node(
			array(
				'id'    => 'my-account',
				'title' => $wl_replacement,
			)
		);
	}
}
add_filter( 'admin_bar_menu', 'white_label_change_howdy', 25 );


// Add Custom Dashboard widget
$dashboard_widget_switch = get_option( 'white_label_dashboard_widget_switch' );

if ( $dashboard_widget_switch ) {

	add_action( 'wp_dashboard_setup', 'white_label_dashboard_widget_one' );

}

function white_label_dashboard_widget_one() {

	$dashboard_widget_title = get_option( 'white_label_dashboard_widget_title' );

	wp_add_dashboard_widget(
		'white_label_dashboard_widget_one',
		$dashboard_widget_title,
		'white_label_dashboard_widget_one_content'
	);

}

function white_label_dashboard_widget_one_content() {
	$dashboard_widget_content = get_option( 'white_label_dashboard_widget_content' );
	echo wpautop( $dashboard_widget_content );
}

// Custom Admin Footer text
$admin_footer = get_option( 'white_label_admin_footer' );

if ( $admin_footer ) {

	function white_label_admin_footer_credit( $text ) {

		$admin_footer = get_option( 'white_label_admin_footer' );

		return $admin_footer;
	}

	add_filter( 'admin_footer_text', 'white_label_admin_footer_credit' );

}

// Custom login styles
function white_label_login_styles() {

	$logo_url         = get_option( 'white_label_custom_logo' );
	$logo_height      = get_option( 'white_label_custom_logo_height' );
	$logo_width       = get_option( 'white_label_custom_logo_width' );
	$login_background = get_option( 'white_label_login_background' );
	$login_bg_image   = get_option( 'white_label_login_background_image' );

	?>
	<style type="text/css">

	body.login {
	  background-image: url(<?php echo $login_bg_image; ?>);
	  background: <?php echo $login_background; ?>;
	  background-repeat: no-repeat;
	  background-size: cover;
	  background-position: center;
	}
	#login h1 a, .login h1 a {
	background-image: url(<?php echo $logo_url; ?>);
		max-height: 200px ;
		width: 300px;
		background-size: contain;
		background-repeat: no-repeat;
	background-position: bottom;

		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'white_label_login_styles' );

// URL & Title for login link
function white_label_login_styles_url() {
	$company_url = get_option( 'white_label_company_url' );
	return $company_url;
}
add_filter( 'login_headerurl', 'white_label_login_styles_url' );

function white_label_login_styles_url_title() {
	$company_name = get_option( 'white_label_company_name' );
	return $company_name;
}

if( version_compare(get_bloginfo('version'),'5.2', '>=') ) {
	add_filter( 'login_headertext', 'white_label_login_styles_url_title' );
} else {
	add_filter( 'login_headertitle', 'white_label_login_styles_url_title' );
}


// livechat / Scripts
function white_label_live_chat() {

	$white_label_live_chat = get_option( 'white_label_live_chat' );

	if ( $white_label_live_chat ) {

		echo $white_label_live_chat;

	}
}
add_action( 'admin_print_footer_scripts', 'white_label_live_chat' );


function white_label_admin_bar_logo() {
	$wl_admin_logo = get_option( 'white_label_admin_bar_logo' );
	if ( $wl_admin_logo ) {
		echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_option( 'white_label_admin_bar_logo' ) . ') !important;
background-position: center;
color:rgba(0, 0, 0, 0);
background-size:cover;

}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: center;
background-size:cover;
}
</style>
';
	}
}

add_action( 'wp_before_admin_bar_render', 'white_label_admin_bar_logo' );
