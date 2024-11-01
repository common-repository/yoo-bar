<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sharabindu.com/
 * @since      2.0.6
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/public
 */

class Yoo_Bar_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        require_once YOO_BAR_PATH . 'class/class-yoobar-topper-bar.php';
        require_once YOO_BAR_PATH . 'class/class-yoobar-footre-bar.php';

    }

    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, YOO_BAR_URL . 'assets/public/css/yoobar.min.css', array() , $this->version, 'all', false);
    }

    public function enqueue_scripts()
    {



    wp_enqueue_script("yoobar-js", YOO_BAR_URL . 'assets/public/js/yoobar.min.js', array(
                'jquery'
            ) , $this->version, false);

    }

}

