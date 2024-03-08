<?php

/**
 * Busicon Toolkit
 *
 * @package           BusiconToolkit
 * @author            Urno IT
 * @copyright         2024 Urno IT
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Busicon Toolkit
 * Plugin URI:        https://urnoit.com/busicon-toolkit
 * Description:       Custom WordPress plugin for Busicon Theme.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Urno IT
 * Author URI:        https://urnoit.com
 * Text Domain:       busicon-toolkit
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://urnoit.com/busicon-toolkit/
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Activate the plugin.
 */
function busicon_toolkit_activate() { 
	flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'busicon_toolkit_activate' );

/**
 * Deactivation hook.
 */
function busicon_toolkit_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'busicon_toolkit_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-busicon-toolkit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_busicon_toolkit() {

	new Busicon_Toolkit();

}
run_busicon_toolkit();