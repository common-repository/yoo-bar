<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.6
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/includes
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class Yoo_Bar
{

    protected $loader;

    
    protected $plugin_name;

 
    protected $version;

   
    public function __construct()
    {
        if (defined('YOO_BAR_VERSION'))
        {
            $this->version = YOO_BAR_VERSION;
        }
        else
        {
            $this->version = '2.0.6';
        }
        $this->plugin_name = 'yoo-bar';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

   
    private function load_dependencies()
    {

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-yoobar-rows.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-yoo-bar-loader.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-yoo-bar-i18n.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'class/admin/class-yoo-bar-admin.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoo-titile-data.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoo-filed-data.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-two-colum.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoo-countdownwrap.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoobar-searchbox.php';

       require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-yoo-settings.php';
       
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoo-specific-field.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-yoo-color-data.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metaData/fieldData/class-news-ticker.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'class/class-yoo-bar-public.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'class/admin/class-yoobar-preview.php';
        $this->loader = new Yoo_Bar_Loader();

    }

    private function set_locale()
    {

        $plugin_i18n = new Yoo_Bar_i18n();

        $this
            ->loader
            ->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    private function define_admin_hooks()
    {

        $plugin_admin = new Yoo_Bar_Admin($this->get_plugin_name() , $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        
        $this->loader->add_filter( 'plugin_action_links_' .plugin_basename( dirname( __DIR__ ).'/yoo-bar.php' ), $plugin_admin, 'plugin_settings_link');

    }

  
    private function define_public_hooks()
    {

        $plugin_public = new Yoo_Bar_Public($this->get_plugin_name() , $this->get_version());

        $this
            ->loader
            ->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this
            ->loader
            ->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

    }

   
    public function run()
    {
        $this
            ->loader
            ->run();
    }

    
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    public function get_loader()
    {
        return $this->loader;
    }

    
    public function get_version()
    {
        return $this->version;
    }

}

