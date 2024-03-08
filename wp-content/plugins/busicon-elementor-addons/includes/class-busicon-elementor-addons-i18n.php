<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://urnothemes.com
 * @since      1.0.0
 *
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/includes
 * @author     Urno IT <urnoit99@gmail.com>
 */
class Busicon_Elementor_Addons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'busicon-elementor-addons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
