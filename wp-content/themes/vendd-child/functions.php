<?php
/**
 * Vendd functions and definitions
 *
 * @package Vendd
 */

/*
 * SETUP NOTES:
 *
 * Change all filename instances from vendd to name of the parent theme
 *
 * Modify VENDD_VERSION constant to whatever the constant in the parent theme is that holds the version number, if there is one. If not, define your own.
 *
 * Find & Replace these 3 strings:
 * vendd
 * Vennd
 * VENDD
 *
 * Install Gulp & all Plugins listed in gulpfile.js
 *
 */

// Root child theme folder directory.
define( 'VENDDCHILD_ROOT_DIR', get_stylesheet_directory() );

// Root child theme folder URL.
define( 'VENDDCHILD_ROOT_URL', get_stylesheet_directory_uri() );

// Root Translations Directory.
define( 'VENDDCHILD_CLASS_TRANSLATIONS_DIR', VENDDCHILD_ROOT_DIR . '/includes/classes/translations/' );

// Root JS URL .
define( 'VENDDCHILD_ROOT_JS_URL', VENDDCHILD_ROOT_URL . '/assets/js/' );

// Nonces array.
define( 'VENDDCHILD_NONCES_ARRAY',
	wp_json_encode(
		array(
			'venddchildadminnonce1' => 'venddchild_somethingsomething_action_callback',
		)
	)
);

add_action( 'init', 'venddchild_jre_create_nonces' );
add_action( 'wp_enqueue_scripts', 'venddchild_enqueue_parent_styles' );
add_filter( 'the_generator', 'venddchild_remove_version' );
add_filter( 'login_errors', 'venddchild_wrong_login' );
add_action( 'admin_enqueue_scripts', 'venddchild_admin_style' );
add_action( 'admin_enqueue_scripts', 'venddchild_jre_admin_js' );
add_action( 'wp_enqueue_scripts', 'venddchild_jre_frontend_js' );

/**
 *  Here we take the Constant defined in venddchild.php that holds the values that all our nonces will be created from, we create the actual nonces using wp_create_nonce, and the we define our new, final nonces Constant, called VENDDCHILD_FINAL_NONCES_ARRAY.
 */
function venddchild_jre_create_nonces() {

	$temp_array = array();
	foreach ( json_decode( VENDDCHILD_NONCES_ARRAY ) as $key => $noncetext ) {
		$nonce              = wp_create_nonce( $noncetext );
		$temp_array[ $key ] = $nonce;
	}

	// Defining our final nonce array.
	define( 'VENDDCHILD_FINAL_NONCES_ARRAY', wp_json_encode( $temp_array ) );

}

/**
 * Function to grab the parent style.
 */
function venddchild_enqueue_parent_styles() {

	wp_register_style( 'parent-style', get_template_directory_uri() . '/style.css', null, VENDD_VERSION );
	wp_enqueue_style( 'parent-style' );

}

/**
 * Function to remove the version number.
 */
function venddchild_remove_version() {
	return false;
}

/**
 * Function to remove incorrect login messages.
 */
function venddchild_wrong_login() {
	return 'Wrong username or password.';
}

/**
 * Adding the admin css file
 */
function venddchild_admin_style() {

	wp_register_style( 'venddchildadminui', get_stylesheet_directory_uri() . '/venddchild-main-admin.css', null, VENDD_VERSION );
	wp_enqueue_style( 'venddchildadminui' );

}

/**
 * Adding the admin js file, with localization.
 */
function venddchild_jre_admin_js() {

	global $wpdb;

	wp_register_script( 'venddchildadminjs', VENDDCHILD_ROOT_JS_URL . 'venddchild_admin.min.js', array( 'jquery' ), VENDD_VERSION, true );

	// Next 4-5 lines are required to allow translations of strings that would otherwise live in the venddchild-admin-js.js JavaScript File.
	require_once VENDDCHILD_CLASS_TRANSLATIONS_DIR . 'class-venddchild-translations.php';
	$trans = new VenddChild_Translations();

	// Localize the script with the appropriate translation array from the Translations class.
	$translation_array1 = $trans->trans_strings();

	// Now grab all of our Nonces to pass to the JavaScript for the Ajax functions and merge with the Translations array.
	$final_array_of_php_values = array_merge( $translation_array1, json_decode( VENDDCHILD_FINAL_NONCES_ARRAY, true ) );

	/* Adding some other individual values we may need.
	$final_array_of_php_values['ROOT_IMG_ICONS_URL']   = ROOT_IMG_ICONS_URL;
	$final_array_of_php_values['ROOT_IMG_URL']   = ROOT_IMG_URL;
	$final_array_of_php_values['EDIT_PAGE_OFFSET']   = EDIT_PAGE_OFFSET;
	$final_array_of_php_values['FOR_TAB_HIGHLIGHT']    = admin_url() . 'admin.php';
	$final_array_of_php_values['SAVED_ATTACHEMENT_ID'] = get_option( 'media_selector_attachment_id', 0 );
	$final_array_of_php_values['LIBRARY_DB_BACKUPS_UPLOAD_URL'] = LIBRARY_DB_BACKUPS_UPLOAD_URL;
	$final_array_of_php_values['SOUNDS_URL'] = SOUNDS_URL;
	$final_array_of_php_values['SETTINGS_PAGE_URL'] = menu_page_url( 'WPBookList-Options-settings', false );
	$final_array_of_php_values['DB_PREFIX'] = $wpdb->prefix;
	*/

	// Now registering/localizing our JavaScript file, passing all the PHP variables we'll need in our $final_array_of_php_values array, to be accessed from 'venddchild_php_variables' object (like venddchild_php_variables.nameofkey, like any other JavaScript object).
	wp_localize_script( 'venddchildadminjs', 'venddchildPhpVariables', $final_array_of_php_values );

	wp_enqueue_script( 'venddchildadminjs' );

	return $final_array_of_php_values;

}

/**
 * Adding the frontend js file
 */
function venddchild_jre_frontend_js() {

	wp_register_script( 'frontendjs', VENDDCHILD_ROOT_JS_URL . 'venddchild_frontend.min.js', array( 'jquery' ), VENDD_VERSION, true );

	// Next 4-5 lines are required to allow translations of strings that would otherwise live in the venddchild-admin-js.js JavaScript File.
	require_once VENDDCHILD_CLASS_TRANSLATIONS_DIR . 'class-venddchild-translations.php';
	$trans = new VenddChild_Translations();

	// Localize the script with the appropriate translation array from the Translations class.
	$translation_array1 = $trans->trans_strings();

	// Now grab all of our Nonces to pass to the JavaScript for the Ajax functions and merge with the Translations array.
	$final_array_of_php_values = array_merge( $translation_array1, json_decode( VENDDCHILD_FINAL_NONCES_ARRAY, true ) );

	/* Adding some other individual values we may need.
	$final_array_of_php_values['ROOT_IMG_ICONS_URL'] = ROOT_IMG_ICONS_URL;
	$final_array_of_php_values['ROOT_IMG_URL']       = ROOT_IMG_URL;
	$final_array_of_php_values['SOUNDS_URL']         = SOUNDS_URL;
	*/

	// Now registering/localizing our JavaScript file, passing all the PHP variables we'll need in our $final_array_of_php_values array, to be accessed from 'venddchild_php_variables' object (like venddchild_php_variables.nameofkey, like any other JavaScript object).
	wp_localize_script( 'frontendjs', 'venddchildPhpVariables', $final_array_of_php_values );

	wp_enqueue_script( 'frontendjs' );

	return $final_array_of_php_values;

}

