<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
		add_action( 'admin_menu', 'white_label_create_settings' );
		add_action( 'admin_init', 'white_label_setup_sections', 1 );
		add_action( 'admin_init', 'white_label_setup_fields' );

function white_label_create_settings() {
	$page_title = 'White Label';
	$menu_title = 'White Label';
	$capability = 'manage_options';
	$slug       = 'white-label';
	$callback   = 'white_label_page_callback';
	$icon       = 'data:image/svg+xml;base64,' . base64_encode(
		'<svg width="20px" height="20px" viewBox="0 0 131 131" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <path d="M127.802807,69.6059385 L65.9736091,7.86562494 C63.7873129,5.67402224 60.8435076,3.81938509 57.1594394,2.28977376 C53.4647581,0.761489073 50.0964292,0 47.0385332,0 L11.0694509,0 C8.06860025,0 5.47768011,1.09845462 3.28607741,3.28475077 C1.09314808,5.47768011 0,8.06860025 0,11.0681243 L0,47.0385332 C0,50.0951026 0.761489073,53.4634314 2.2911004,57.1541328 C3.81938509,60.8435076 5.67932878,63.7554736 7.86695157,65.8913576 L69.6948231,127.802807 C71.8254005,129.932058 74.4216272,131 77.47289,131 C80.4737407,131 83.0965001,129.932058 85.3451482,127.802807 L127.802807,85.2562635 C129.932058,83.1217062 131,80.5307861 131,77.4781966 C131,74.4773459 129.932058,71.8559132 127.802807,69.6059385 Z M35.4981265,35.4967999 C33.3317299,37.6578899 30.7248901,38.736445 27.6669941,38.736445 C24.6157313,38.736445 22.0088915,37.6578899 19.8424949,35.4967999 C17.6814048,33.3317299 16.6041764,30.7248901 16.6041764,27.6723007 C16.6041764,24.6144046 17.6814048,22.0075649 19.8424949,19.8478014 C22.0088915,17.6814048 24.6157313,16.6028497 27.6669941,16.6028497 C30.7248901,16.6028497 33.3317299,17.6814048 35.4981265,19.8478014 C37.6592166,22.0075649 38.736445,24.6144046 38.736445,27.6723007 C38.736445,30.7248901 37.6592166,33.3317299 35.4981265,35.4967999 Z" id="Fill-1" fill="#A0A5AA"></path>
    </g>
</svg>'
	);
	$position   = 100;
	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	add_submenu_page( 'white-label', 'White Label', 'General', 'manage_options', 'white-label' );
	do_action( 'white_label_menus' );
}

function white_label_page_callback() {
	?>
		  <div class="wrap">
			  <h1>White Label</h1>
	   <?php settings_errors(); ?>
			<?php do_action( 'white_label_above_page' ); ?>
	   <div class="white-label-main-section">
	   <form method="POST" action="options.php">
		   <?php
			do_action( 'white_label_above_settings' );
			settings_fields( 'white_label_callback' );
			do_settings_sections( 'white_label_callback' );
			do_action( 'white_label_below_settings' );
			?>

		   <?php
			   submit_button();
			?>
			  </form>
	   </div>
	   <?php
		do_action( 'white_label_below_page' );
		?>
	 </div>
	<?php
}

function white_label_setup_sections() {
	add_settings_section( 'white_label_section_start', 'Enable', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_branding', 'Branding', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_login', 'WordPress Login', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_admin', 'Admin Area', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_dashboard_widget', 'Dashboard Widget', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_custom_dashboard', 'Custom Dashboard Page', array(), 'white_label_callback' );
	add_settings_section( 'white_label_section_live_chat', 'Live Chat / Scripts', array(), 'white_label_callback' );
}

function white_label_setup_fields() {
	$fields = array(
		array(
			'label'   => 'Enable (Master Switch)',
			'id'      => 'white_label_section_start',
			'type'    => 'checkbox',
			'section' => 'white_label_section_start',
			'options' => array(
				'on' => 'Activate White Label',
			),
		),
		array(
			'label'   => 'Company name',
			'id'      => 'white_label_company_name',
			'type'    => 'textfield',
			'section' => 'white_label_section_branding',
		),
		array(
			'label'   => 'Your Website',
			'id'      => 'white_label_company_url',
			'type'    => 'url',
			'section' => 'white_label_section_branding',
		),
		array(
			'label'   => 'Logo',
			'id'      => 'white_label_custom_logo',
			'type'    => 'media',
			'section' => 'white_label_section_login',
		),
		array(
			'label'   => 'Background image',
			'id'      => 'white_label_login_background_image',
			'type'    => 'media',
			'section' => 'white_label_section_login',
		),
		array(
			'label'   => 'or background color',
			'id'      => 'white_label_login_background',
			'class'   => 'white-label-color',
			'type'    => 'text',
			'section' => 'white_label_section_login',
			'desc'    => 'choose a color or image below',
		),
		array(
			'label'   => 'Remove WordPress Logo in Admin bar',
			'id'      => 'white_label_admin_area',
			'type'    => 'checkbox',
			'section' => 'white_label_section_admin',
			'options' => array(
				'remove-wp-logo-admin-bar' => '',
			),
		),
		array(
			'label'   => 'or use your own logo',
			'id'      => 'white_label_admin_bar_logo',
			'type'    => 'media',
			'section' => 'white_label_section_admin',
		),
		array(
			'label'       => 'Replace Howdy in Admin Bar',
			'id'          => 'white_label_admin_howdy',
			'type'        => 'textfield',
			'desc'        => '"Welcome" may more more professional',
			'placeholder' => 'Howdy',
			'section'     => 'white_label_section_admin',
		),
		array(
			'label'       => 'Admin footer credit',
			'id'          => 'white_label_admin_footer',
			'type'        => 'textfield',
			'placeholder' => 'Thank you for creating with WordPress.',
			'section'     => 'white_label_section_admin',
		),
		array(
			'label'   => 'Enable Widget',
			'id'      => 'white_label_dashboard_widget_switch',
			'type'    => 'checkbox',
			'section' => 'white_label_section_dashboard_widget',
			'options' => array(
				'on' => 'Enable widget',
			),
		),
		array(
			'label'       => 'Widget title',
			'id'          => 'white_label_dashboard_widget_title',
			'type'        => 'textfield',
			'desc'        => '',
			'placeholder' => 'Support',
			'section'     => 'white_label_section_dashboard_widget',
		),
		array(
			'label'   => 'Widget content',
			'id'      => 'white_label_dashboard_widget_content',
			'type'    => 'wysiwyg',
			'section' => 'white_label_section_dashboard_widget',
		),
		array(
			'label'   => 'Custom dashboard',
			'id'      => 'white_label_custom_dashboard_switch',
			'type'    => 'checkbox',
			'section' => 'white_label_section_custom_dashboard',
			'options' => array(
				'on' => 'Enable',
			),
		),
		array(
			'label'   => 'Dashboard',
			'id'      => 'white_label_custom_dashboard',
			'type'    => 'wysiwyg',
			'section' => 'white_label_section_custom_dashboard',
		),
		array(
			'label'       => 'Live Chat',
			'id'          => 'white_label_live_chat',
			'placeholder' => '<script>Whole script here</script>',
			'type'        => 'textarea',
			'section'     => 'white_label_section_live_chat',
			'desc'        => 'Add a live chat in the admin area for your client, or run any JS script.',
		),
	);
	foreach ( $fields as $field ) {
		add_settings_field( $field['id'], $field['label'], 'white_label_field_callback', 'white_label_callback', $field['section'], $field );
		register_setting( 'white_label_callback', $field['id'] );
	}
}

function white_label_field_callback( $field ) {
	$placeholdercheck = '';
	$class            = '';

	if ( isset( $field['class'] ) ) {
		$class = $field['class'];
	}

	if ( isset( $field['placeholder'] ) ) {
		$placeholdercheck = $field['placeholder'];
	}

	$value = get_option( $field['id'] ) ;

	switch ( $field['type'] ) {
		case 'textarea':
			printf(
				'<textarea name="%1$s" id="%1$s" placeholder="%2$s" class="%3$s" rows="5" cols="50">%4$s</textarea>',
				$field['id'],
				$placeholdercheck,
				$class,
				$value
			);
			break;
		case 'select':
		case 'multiselect':
			if ( ! empty( $field['options'] ) && is_array( $field['options'] ) ) {
				$attr    = '';
				$options = '';
				foreach ( $field['options'] as $key => $label ) {
						  // Fix for PHP notice array_search
					if ( is_array( $value ) || is_object( $value ) ) {
						$selectcheck = selected( true, in_array( $key, $value ), false );
					} else {
						$selectcheck = selected( $value, $key, false );
					}

					$options .= sprintf(
						'<option value="%s" %s>%s</option>',
						$key,
						$selectcheck,
						$label
					);
				}
				if ( $field['type'] === 'multiselect' ) {
						  $attr = ' multiple="multiple" ';
				}
				printf(
					'<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>',
					$field['id'],
					$attr,
					$options
				);
			}
			break;
		case 'radio':
		case 'checkbox':
			if ( ! empty( $field['options'] ) && is_array( $field['options'] ) ) {
				$options_markup = '';
				$iterator       = 0;

				foreach ( $field['options'] as $key => $label ) {
					// checks if the value is in array. it was throwing a error because second value of array search was a string, when no checkbox was selected.
					if ( is_array( $value ) || is_object( $value ) ) {
						$checkboxcheck = checked( true, in_array( $key, $value ), false );
					} else {
						$checkboxcheck = checked( $value, $key, false );
					}
					++$iterator;
					$options_markup .= sprintf(
						'<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>',
						$field['id'],
						$field['type'],
						$key,
						$checkboxcheck,
						$label,
						$iterator
					);
				}
				printf(
					'<fieldset>%s</fieldset>',
					$options_markup
				);
			}
			break;
		case 'media':
			printf(
				'<input style="width: 40%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button test-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
				$field['id'],
				$field['id'],
				$value,
				$field['id'],
				$field['id']
			);
			break;

		case 'wysiwyg':
			wp_editor( $value, $field['id'] );
			break;
		default:
		
		// fixes html escape
		if (is_string( $value)) {
		$value = htmlspecialchars($value);
		}
			printf(
				'<input name="%1$s" id="%1$s" type="%2$s" value="%3$s" placeholder="%4$s" class="%5$s"   />',
				$field['id'],
				$field['type'],
				$value,
				$placeholdercheck,
				$class
			);
	}
	if ( isset( $field['desc'] ) ) {
		printf( '<p class="description">%s </p>', $field['desc'] );
	}
}
function white_label_media_fields() {
	?>
		<script>
	   jQuery(document).ready(function($){
		 if ( typeof wp.media !== 'undefined' ) {
		   var _custom_media = true,
		   _orig_send_attachment = wp.media.editor.send.attachment;
		   $('.test-media').click(function(e) {
			 var send_attachment_bkp = wp.media.editor.send.attachment;
			 var button = $(this);
			 var id = button.attr('id').replace('_button', '');
			 _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment){
			   if ( _custom_media ) {
				 $('input#'+id).val(attachment.url);
			   } else {
				 return _orig_send_attachment.apply( this, [props, attachment] );
			   };
			 }
			 wp.media.editor.open(button);
			 return false;
		   });
		   $('.add_media').on('click', function(){
			 _custom_media = false;
		   });
		 }
	   });
	 </script>
	 <?php
}
	add_action( 'admin_footer', 'white_label_media_fields' );

function white_label_enqueue_scripts() {
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'white-label' || 'white-label-pro' ) {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'white-label-js', plugins_url( '../js/admin.js', __FILE__ ) );
		wp_enqueue_style( 'white-label-css', plugins_url( '../includes/white-label.css', __FILE__ ) );
	} else {
		wp_dequeue_script( 'white-label-css' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_dequeue_script( 'wp-color-picker' );
		wp_dequeue_script( 'white-label-js' );
	}
}
add_action( 'admin_enqueue_scripts', 'white_label_enqueue_scripts' );
