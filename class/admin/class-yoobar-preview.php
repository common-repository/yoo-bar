<?php
class YooBarPreview
{
    public function __construct()
    {
        if (in_array($GLOBALS['pagenow'], array(
            'post.php',
            'post-new.php'
        )))
        {
            add_filter('admin_footer_text', array(
                $this,
                'Yoobar_previewfooter_admin_text'
            ));
        }
    }
    function Yoobar_previewfooter_admin_text($text)
    {
        $post_type = filter_input(INPUT_GET, 'post_type');
        if (!$post_type) $post_type = get_post_type(filter_input(INPUT_GET, 'post'));
        $html = '';
        global $post;
        $post_id = $post->ID;

        $rand = rand(67586707, 3058503);
        $randt = rand(10000, 396742);
        
        include YOO_BAR_PATH . 'assets/public/extra/ToPviews.php';

          
            if (empty($yoo_bar_back))
            {
                $yoo_bar_back = '#f5f5f5';
            }

            if (empty($yoo_main_title))
            {
                $yoo_main_title = '<span style="font-size: 16pt;">YooBar Plugin is Live! Full Support and Features Available! </span>';
            }


            if ('publish' === get_post_status($post_id) && get_post_type() == 'yoo_bar')
            {


            $html = '<style>' . $yoo_barcustom_css . '.yoo-conatainer:before {
              background:' . $yoo_bar_back . ';</style><div id="prevdiv"><div id="alert-container">
      <div class="ybr-ybar-container" >
        <div class="ybr-ybar-notification-bar ybr-ybar-bgcolor-notification" ><div class="yoo-conatainer" style="background:' . $yoo_bar_back . ' url(' . $yoo_bar_back_image . ');background-size:' . $yoo_bar_back_size . ';background-repeat:' . $yoo_bar_back_repeat . ';background-position:' . $yoo_bar_back_position . ';"><div class="yoo-row" style="justify-content:' . $ybar_clum_position . ';padding:' . $yoo_bar_wrapper_height . 'px 0"><div class="yoo-col-6 ' . $ybarnoclass_left . '">' . $column_left . '</div>

          <div class="yoo-col-4 ' . $ybarnoclass_right . '">' . $column_right . '</div>
        </div><div class="ybr-ybar-button ybr-ybar-padding-text " >' . $hidecls_btn . '</div></div></div></div></div></div>';
             
        }elseif(get_post_type() == 'yoo_bar'){

                  $html = '<style>' . $yoo_barcustom_css . '.yoo-conatainer:before {
              background:rgba(30, 176, 30, 1);</style><style>div#Maintitle,div#YooFiledData{
            background:#dffbbf;
         }</style><div id="prevdiv"><div id="alert-container">
            <div class="ybr-ybar-container" >
              <div class="ybr-ybar-notification-bar ybr-ybar-bgcolor-notification" ><div class="yoo-conatainer"><div class="yoo-row" style="justify-content:center;padding:20px 0"><div class="yoo-col-6 ' . $ybarnoclass_left . '"><style>div#Maintitle{
            background:#dffbbf;
         }</style><div class="ybr-ybar-text" style= "color:#fff">' . wp_kses_post($yoo_main_title) . '</div></div>

                <div class="yoo-col-4 ' . $ybarnoclass_right . '"><div class="yoobar_button"><a style="background:#e53434;border-radius:5px;color:#fff" href="https://sharabindu.com/plugins/yoo-bar//" class="ybr-ybar-button-text ybr-ybar-padding-text">Learn More</a></div></div>
              </div><div class="ybr-ybar-button ybr-ybar-padding-text " >' . $hidecls_btn . '</div></div></div></div></div></div>';
        }
        return $html;
    }

}
if (class_exists('YooBarPreview'))
{
    new YooBarPreview;
}

