<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/yoo-bar/
 * @since      2.0.6
 *
 * @package    yoo-bar
 * @subpackage yoo-bar/admin
 */

class YooBar_tutorial
{

    public function __construct()
    {

        add_action('admin_menu', array(
            $this,
            'admin_menu_define'
        ));
        add_action("admin_enqueue_scripts", array(
            $this,
            "yoobarAdmmin_script"
        ));
    }
    public function yoobarAdmmin_script()
    {

        wp_enqueue_script("video-popup", YOO_BAR_URL . 'assets/admin/js/video.popup.js', array(
            'jquery'
        ) , "1.0", false, 100);
    }

    function elfi__settting_func()
    {

        return;
    }

    public function admin_menu_define()
    {

        add_submenu_page('edit.php?post_type=yoo_bar', __('Get Pro', 'yoo-bar') , __('Get Pro version', 'yoo-bar') , 'manage_options', 'https://sharabindu.com/plugins/yoo-bar/' );

    }

}

if (class_exists('YooBar_tutorial'))
{
    new YooBar_tutorial;
};

