<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sharabindu.com/
 * @since      2.0.6
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.0.6
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class Yoo_Bar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.6
	 */
	public static function activate() {


	flush_rewrite_rules();

	}

}
