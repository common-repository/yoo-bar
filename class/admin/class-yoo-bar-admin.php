<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sharabindu.com/
 * @since      2.0.6
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/admin
 */

class Yoo_Bar_Admin
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_filter( 'plugin_row_meta', array($this,'yoobar_plugin_row_meta'), 10, 4 );


        require_once YOO_BAR_PATH . 'class/admin/class-yoo-howto-use.php';
        require_once YOO_BAR_PATH . 'class/admin/class-yoo-tutorial.php';

        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-custom-save-data.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoobar-shortcode-meta.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-text-carousel.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-typed-animation.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-address-field.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-navbar-items.php';

        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoobar-social-link.php';
        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-contact-form.php';

        require_once YOO_BAR_PATH . 'includes/metaData/fieldData/class-yoo-gallery-data.php';
        require_once YOO_BAR_PATH . 'class/class-yoobar-shortcode.php';



    }

    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, YOO_BAR_URL . 'assets/admin/css/yoo-bar-admin.css', array() , $this->version, 'all');

        wp_enqueue_style('select2', YOO_BAR_URL . 'assets/admin/css/select2.min.css', array() , $this->version, 'all');

        wp_enqueue_style('minicolors', YOO_BAR_URL . 'assets/admin/css/jquery.minicolors.css', array() , $this->version, 'all');

        wp_enqueue_style('wp-color-picker');

        wp_enqueue_style("yoobar-css", YOO_BAR_URL . 'assets/public/css/yoobar.min.css', array() , $this->version, 'all');

    }

    public function enqueue_scripts()
    {

        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script($this->plugin_name, YOO_BAR_URL . 'assets/admin/js/yoo-bar-admin.js', array(
            'jquery',
            'select2',
            'minicolors',
            'wp-color-picker'
        ) , $this->version, true);

        wp_enqueue_script('select2', YOO_BAR_URL . 'assets/admin/js/select2.min.js', array(
            'jquery'
        ) , $this->version, true);


        wp_enqueue_script('minicolors', YOO_BAR_URL . 'assets/admin/js/jquery.minicolors.min.js', array(
            'jquery'
        ) , $this->version, false, 100);

    }

    function yoobar_plugin_row_meta( $plugin_meta, $plugin_file, $plugin_data, $status ) {
     
        if ( strpos( $plugin_file, 'yoo-bar.php' ) !== false ) {
            $new_links = array(
                'docs' => '<a href="' . esc_url('https://yoobar.dipashi.com/docs/introduction/') . '" target="_blank">' . esc_html__('Documentation', 'yoo-bar') . '</a>');
             
            $plugin_meta = array_merge( $plugin_meta, $new_links );
        }
         
        return $plugin_meta;
    }


    public function plugin_settings_link($links)
    {

        return array_merge(array(
            '<a href="' . admin_url('post-new.php?post_type=yoo_bar') . '">' . __('Add New Bar', 'yoo-bar') . '</a>',
            '<a class="yhow_yse" href="https://sharabindu.com/plugins/yoo-bar/">' . __('Get Pro', 'yoo-bar') . '</a>',
        ) , $links);

    }

}

