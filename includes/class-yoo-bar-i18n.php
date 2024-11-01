<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://sharabindu.com/
 * @since      2.0.6
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.0.6
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class Yoo_Bar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    2.0.6
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'yoo-bar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
