<?php
/**
 * Plugin Name:       YooBar notification
 * Plugin URI:        https://wordpress.org/plugins/yoo-bar/
 * Description:       With this plugin you can display attractive and functional notification bar in the Top and footer position of your WordPress website.
 * Version:           2.0.6
 * Author:            Sharabindu
 * Author URI:        https://sharabindu.com/plugins/yoo-bar/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yoo-bar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC'))
{
    die;
}

/**
 * Currently plugin version.
 * Start at version 2.0.6 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('YOO_BAR_VERSION', '2.0.6');

/**
 * plugin define directory.
 *
 */

define('YOO_BAR_DIR', plugin_dir_url(__DIR__));

/**
 * define plugin path.
 *
 */
define('YOO_BAR_PATH', plugin_dir_path(__FILE__));

/**
 * define plugin url.
 *
 */
define('YOO_BAR_URL', plugin_dir_url(__FILE__));
/**
 *  define plugin basename.
 *
 */
define('YOO_BAR_BASENAME', plugin_basename( dirname( __DIR__ )));



if (!defined('YOO_BAR_PLUGIN_ID'))
{
    define('YOO_BAR_PLUGIN_ID', 'how_to_use'); // unique prefix (same plugin ID name for 'lite' and 'pro')
    
}

/**
 *Include plugin.php
 *Check Qr composer Pro Version is enable.
 * Then Deactive Pro version and activate Lite version
 */

include_once(ABSPATH.'wp-admin/includes/plugin.php');
if( is_plugin_active('yoo-bar-pro/yoo-bar-pro.php') ){
     add_action('update_option_active_plugins', 'deactivate_yoobar_pro_version');
}
function deactivate_yoobar_pro_version(){
   deactivate_plugins('yoo-bar-pro/yoo-bar-pro.php');
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yoo-bar-activator.php
 */
function activate_yoo_bar()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-yoo-bar-activator.php';
    Yoo_Bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yoo-bar-deactivator.php
 */
function deactivate_yoo_bar()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-yoo-bar-deactivator.php';

    Yoo_Bar_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_yoo_bar');
register_deactivation_hook(__FILE__, 'deactivate_yoo_bar');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-yoo-bar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.6
 */
function run_yoo_bar()
{

    $plugin = new Yoo_Bar();
    $plugin->run();

}
run_yoo_bar();

