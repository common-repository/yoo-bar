<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Yoo_Bar
 * @subpackage Yoo_Bar/public
 * @author     Sharabindu <plugin@sharabindu.com>
 */
class Yoobar_DyanamciShortcode
{

    public function __construct()
    {
        add_action('init', array(
            $this,
            'yoobar_dynamic_shortcode'
        ));


    }


    public function yoobar_dynamic_shortcode()
    {

        add_shortcode("yoobar_scode", array(
            $this,
            "shortcode_attributes"
        ));
    }

    public function shortcode_attributes($atts)
    {

        global $post;
        $post->ID;
        extract(shortcode_atts(array(
            'id' => $post->ID,

        ) , $atts));

        $post_id = $id;

         $rand = rand(67586707, 3058503);
         $randt = rand(10000, 396742);
         
        include YOO_BAR_PATH . 'assets/public/extra/ToPviews.php';

        if (empty($yoo_bar_back))
        {
            $yoo_bar_back = '#f5f5f5';
        }
        $yoo_bar_wrapper_height = get_post_meta($post_id, "yoo_bar_wrapper_height", true);
        $hide_top_bar = get_post_meta($post_id, "hide_top_bar", true);
        $display_footer_bar = get_post_meta($post_id, "display_footer_bar", true);

        $html = '<style>.yoo-conatainer-' . $rand . '{
                            position:relative;z-index:1
                            }.yoo-conatainer-' . $rand . ':before {
                            background:' . $yoo_bar_back . ';z-index:-1;content:"";position:absolute;width:100%;height:100%;left:0;}</style><div id="topbarpositong"><div id="alert-container" >
                    <div class="ybr-ybar-container">
                      <div class="ybr-ybar-notification-bar ybr-ybar-bgcolor-notification ' . $ybarnoclass_right_row . '" ><div class="yoo-conatainer-' . $rand . '" id="yoo-conatainer" style="background:' . $yoo_bar_back . ' url(' . $yoo_bar_back_image . ');background-size:' . $yoo_bar_back_size . ';background-repeat:' . $yoo_bar_back_repeat . ';background-position:' . $yoo_bar_back_position . ';"><div class="yoo-row " style="justify-content:' . $ybar_clum_position . ';padding:' . $yoo_bar_wrapper_height . 'px 0"><div class="yoo-col-6 ' . $ybarnoclass_left . '">' . $column_left . '</div>

                        <div class="yoo-col-4 ' . $ybarnoclass_right . '">' . $column_right . '</div>
                      </div><div class="ybr-ybar-button ybr-ybar-padding-text " >' . $hidecls_btn . '</div></div></div></div></div></div>';

        return $html;

    }
}

if (class_exists('Yoobar_DyanamciShortcode'))
{
    new Yoobar_DyanamciShortcode;
};

