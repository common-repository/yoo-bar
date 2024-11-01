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
class Yoobar_topper_bar
{

    public function __construct()
    {
        add_action('wp_body_open', array(
            $this,
            'display_notification_top'
        ));


    }

    function display_notification_top()
    {

        $args = new WP_Query(array(

            'post_type' => 'yoo_bar',
            'post_status' => 'publish',
            'posts_per_page' => - 1

        ));

        while ($args->have_posts())
        {
            $args->the_post();

            $post_id = get_the_ID();
            
            $rand = rand(67586707, 3058503);
            $randt = rand(10000, 396742);
            
            include YOO_BAR_PATH . 'assets/public/extra/ToPviews.php';

            $hide_top_bar = get_post_meta($post_id, "hide_top_bar", true);
            $yoo_bar_fixedtopbar = get_post_meta($post_id, "yoo_bar_fixedtopbar", true);
            if ($yoo_bar_fixedtopbar)
            {
                $yoo_bar_fixedtopbar = 'yoobarsticky';
            }
            else
            {
                $yoo_bar_fixedtopbar = ' ';
            }

            if (!$hide_top_bar)
            {

                $html = '<style>.yoo-conatainer-' . $rand . '{
                position:relative;z-index:1
                }.yoo-conatainer-' . $rand . ':before {
                background:' . $yoo_bar_back . ';z-index:-1;content:"";position:absolute;width:100%;height:100%;left:0;}</style><div id="topbarpositong" class="' . $yooslideUp . '"><div id="alert-container" class="' . $yoo_bar_fixedtopbar . '">
                <div class="ybr-ybar-container">
                <div class="ybr-ybar-notification-bar ybr-ybar-bgcolor-notification ' . $ybarnoclass_right_row . '" ><div class="yoo-conatainer-' . $rand . '" id="yoo-conatainer" style="background:' . $yoo_bar_back . ' url(' . $yoo_bar_back_image . ');background-size:' . $yoo_bar_back_size . ';background-repeat:' . $yoo_bar_back_repeat . ';background-position:' . $yoo_bar_back_position . ';"><div class="yoo-row" style="justify-content:' . $ybar_clum_position . ';padding:' . $yoo_bar_wrapper_height . 'px 0"><div class="yoo-col-6 ' . $ybarnoclass_left . '">' . $column_left . '</div>

                <div class="yoo-col-4 ' . $ybarnoclass_right . '">' . $column_right . '</div>
                </div><div class="ybr-ybar-button ybr-ybar-padding-text " >' . $hidecls_btn . '</div></div></div></div></div></div>';
             include YOO_BAR_PATH . 'assets/public/view/YooDislaysg.php';   
                
            }
        }
        wp_reset_query();
        wp_reset_postdata();

    }

}

if (class_exists('Yoobar_topper_bar'))
{
    new Yoobar_topper_bar;
};

