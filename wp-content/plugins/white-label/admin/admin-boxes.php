<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

function white_label_admin_box_branding() {
	$logo_url         = get_option( 'white_label_custom_logo' );
	$login_background = get_option( 'white_label_login_background' );
	$login_bg_image   = get_option( 'white_label_login_background_image' );

	if ( $logo_url || $login_background || $login_bg_image ) {
		echo "<div class='white-label-upgrade-pro white-label-branding' style='background:$login_background; background-image:url($login_bg_image); background-position: center; background-size: cover;'>";

		echo "<img class='white-label-brand-img' src='$logo_url' />";
		echo '</div>';
	}
}
add_action( 'white_label_below_page', 'white_label_admin_box_branding', 1 );

function white_label_admin_box_upgrade() {
	$white_label_license_message = '<strong><a href="https://whitewp.com/?utm_source=active_worg&utm_medium=referral" target="_blank">Get Pro features & support</a> </strong>
	<ul>
	<li>Set which admins have access to White Label</li>
	<li>Hide plugins in the plugins list from other admins</li>
	<li>Custom WordPress email and sender name</li>
	<li>Set a welcome panel for other admins on the dashboard</li>
	<li>Hide all default WordPress dashboard widgets</li>
	<li>Premium Support</li>
	<li>Upcoming features</li>
	</ul>';

	echo '<div class="white-label-upgrade-pro">
           <h2>Pro Version</h2>';

	echo $white_label_license_message;

	echo '<p>Read more about <a href="https://whitewp.com/?utm_source=active_worg&utm_medium=referral" target="_blank">Pro features</a></p></div>';
}
 add_action( 'white_label_below_page', 'white_label_admin_box_upgrade' );

function white_label_admin_box_start() {
	echo '<div class="white-label-upgrade-pro">
   <h2>Getting Started</h2>
   <ol>
    <li>Upload your logo to replace the WordPress <a href="/wp-login.php" target="_blank">wp-login</a> icon.</li>
   <li>Your URL and company name will be used on your login logo link</li>
   <li>White Label plugin <strong>only shows for Administrators</strong>, Editors can\'t see the menu.<br /><br /> Use the Pro version to hide plugins from multiple admins</li>
   </ol>
   <p>More features coming, if you have an idea just <a href="https://whitewp.com/planned-features/?utm_source=active_worg&utm_medium=referral" target="_blank">reach out</a></p>
   <p>&#9733; <a href="https://wordpress.org/plugins/white-label/" target="_blank">Leave a review</a> they help a lot</p>
   </div>';
}
 add_action( 'white_label_below_page', 'white_label_admin_box_start', 2 );
