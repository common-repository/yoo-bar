<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://sharabindu.com/
 * @since      2.0.6
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      2.0.6
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class Yoo_Bar_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.6
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
